<?php

require_once FIRST_PARENT_DIR . 'models/User.php';

class Login
{
  use UserController;

  public function index()
  {
    $user = new User();

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
      $this->loadUserPage(filePath: 'auth/login');
      return;
    }

    $result = json_decode(file_get_contents("php://input"), true);
    $email = cleanString($result['email'], 'email');
    $password = cleanString($result['password'], 'text');

    if (isFalsy($email)) {
      $this->response = array('status' => false, 'message' => 'Enter proper email address');
      sendDataToUser(contentType: $this->dataType, response: $this->response);
      return;
    }

    if (isFalsy($password)) {
      $this->response = array('status' => false, 'message' => 'Password is required!');
      sendDataToUser(contentType: $this->dataType, response: $this->response);
      return;
    }

    if (!$user->checkIfAccountExist(['email' => $email])) {
      $this->response = array('status' => false, 'message' => 'Email entered is not registered');
      sendDataToUser(contentType: $this->dataType, response: $this->response);
      return;
    }

    list($encryptedKey) = encryptUserPassword($password);
    $response = $user->getUserDetails(['email' => $email, 'encrypted_pass' => $encryptedKey]);

    if (!$response || !decryptUserPassword($password, $response[0]['password'])) {
      $this->response = array('status' => false, 'message' => 'You entered the wrong password');
      sendDataToUser(contentType: $this->dataType, response: $this->response);
      return;
    }

    if ($response) {
      $result = $user->updateUserLogTime(userData: ["email" => $email]);
      if ($result) {
        $this->session->__set("user", $email);
        $this->response = array('status' => true, 'message' => 'Logged In successfully');
        sendDataToUser(contentType: $this->dataType, response: $this->response);
        exit;
      }
    }
  }
}
