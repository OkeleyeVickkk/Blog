<?php

require_once FIRST_PARENT_DIR . 'models/User.php';

class Login
{
  use Controller;
  public function index()
  {
    $user = new User();

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
      $this->loadPage(filePath: 'auth/login');
      return;
    }

    $email = cleanString($_POST['email'], 'email');
    $password = cleanString($_POST['password'], 'text');

    if (isFalsy($email) || isFalsy($password)) {
      $this->pageData['errorMessage'] = 'Error occurred';
      $this->loadPage(filePath: 'auth/login');
      return;
    }


    if (!$user->checkIfAccountExist(['email' => $email])) {
      $this->pageData['errorMessage'] = 'Email entered is not registered';
      $this->loadPage(filePath: 'auth/login');
      return;
    }

    list($encryptedKey) = encryptUserPassword($password);
    $response = $user->getUserDetails(['email' => $email, 'encrypted_pass' => $encryptedKey]);

    if (!$response || !decryptUserPassword($password, $response[0]['password'])) {
      $this->pageData['errorMessage'] = 'You entered the wrong password';
      $this->loadPage(filePath: 'auth/login');
      return;
    }

    $user->updateUserLogTime(userData: ["email" => $email]);
  }
}
