<?php

require_once FIRST_PARENT_DIR . 'models/User.php';
require_once FIRST_PARENT_DIR . 'core/Session.php';

class Login
{
  use UserController;

  protected $user;

  public function __construct()
  {
    if (!isset($this->user)) {
      $this->user = new User();
    }

    $user = Session::getInstance()->__get(USER_SESSION);
    if ($user) {
      $this->pageData = ['status' => true, "message" => 'isLoggedIn'];
      sendDataToUser(contentType: 'application/json', response: $this->pageData);
      redirectTo(toLocation: 'dashboard/index', replace: true);
    }
  }

  public function index()
  {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
      $this->loadUserPage(filePath: 'auth/login');
      return;
    }

    $userInput = json_decode(file_get_contents("php://input"), true);
    $email = cleanString($userInput['email'], 'email');
    $password = cleanString($userInput['password'], 'text');

    if (isFalsy($email)) {
      $this->pageData = array('status' => false, 'message' => 'Enter proper email address');
      sendDataToUser(contentType: $this->dataType, response: $this->pageData);
      return;
    }

    if (isFalsy($password)) {
      $this->pageData = array('status' => false, 'message' => 'Password is required!');
      sendDataToUser(contentType: $this->dataType, response: $this->pageData);
      return;
    }

    if (!$this->user->checkIfAccountExist(['email' => $email])) {
      $this->pageData = array('status' => false, 'message' => 'Email entered is not registered');
      sendDataToUser(contentType: $this->dataType, response: $this->pageData);
      return;
    }

    list($encryptedKey) = encryptUserPassword($password);
    $response = $this->user->getUserAuthDetails(['email' => $email, 'encryptedPass' => $encryptedKey]);

    if (!$response || !decryptUserPassword($password, $response[0]['password'])) {
      $this->pageData = array('status' => false, 'message' => 'Password incorrect!');
      sendDataToUser(contentType: $this->dataType, response: $this->pageData);
      return;
    }

    if ($response) {
      $response = $this->user->updateUserLogTime(userData: ["email" => $email]);
      if (!$response) {
        redirectTo(toLocation: 'login', replace: true);
        return;
      }
      Session::getInstance()->__set(USER_SESSION, $email);
      $this->pageData = array('status' => true, 'message' => 'Logged In successfully');
      sendDataToUser(contentType: $this->dataType, response: $this->pageData);
      exit;
    }
  }
}
