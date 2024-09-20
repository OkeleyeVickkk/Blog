<?php

require_once FIRST_PARENT_DIR . "models/User.php";

class Register
{
  use Controller;

  public function index()
  {
    if (strtoupper($_SERVER["REQUEST_METHOD"]) !== "POST") {
      $this->loadPage(filePath: 'auth/register');
      return;
    }

    $fullname = cleanString(string: $_POST['fullname'], type: "text");
    $email = cleanString(string: $_POST['email'], type: "email");
    $password = cleanString(string: $_POST['password'], type: "text");

    if (isFalsy($fullname) || isFalsy($email) || isFalsy($password)) {
      $this->pageData['errorMessage'] = "Email or fullname or password is error";
      $this->loadPage(filePath: 'auth/register');
      return;
    }

    $newUser = new User();
    list($encrpyt_key, $hashedPass) = encryptUserPassword(passwordToEncrypt: $password);
    $response = $newUser->registerUser(
      userData: [
        "fullname" => $fullname,
        "email" => $email,
        "password" => $hashedPass,
        "encrypt_key" => $encrpyt_key
      ]
    );
    if ($response) {
      redirectTo(toLocation: 'index.php', replace: true);
    }
  }
}
