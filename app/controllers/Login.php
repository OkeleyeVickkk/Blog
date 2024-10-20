<?php

require_once FIRST_PARENT_DIR . 'models/User.php';

class Login
{
  use UserController;

  protected $user;

  public function __construct()
  {
    if (!isset($this->user)) {
      $this->user = new User();
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
    $response = $this->user->getUserDetails(['email' => $email, 'encryptedPass' => $encryptedKey]);

    if (!$response || !decryptUserPassword($password, $response[0]['password'])) {
      $this->pageData = array('status' => false, 'message' => 'You entered the wrong password');
      sendDataToUser(contentType: $this->dataType, response: $this->pageData);
      return;
    }

    if ($response) {
      // $result = $this->user->updateUserLogTime(userData: ["email" => $email]);
      // if ($result) {
      $this->pageData = array('status' => true, 'message' => 'Logged In successfully');
      sendDataToUser(contentType: $this->dataType, response: $this->pageData);

      exit;
      // }
    }
  }
}
