<?php

require_once FIRST_PARENT_DIR . "models/User.php";

class Register
{
  use Controller;

  public function index()
  {
    $newUser = new User();

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

    if ($newUser->checkIfAccountExist(["email" => $email])) {
      $this->pageData['errorMessage'] = "Email already exist";
      $this->loadPage(filePath: 'auth/register');
      return;
    };

    $fullnameArr = explode(" ", $fullname);
    if (count($fullnameArr) > 1) {
      $username = $fullnameArr[1] . '-' . generateRandomString(stringLength: 6);
    } else {
      $username = $fullnameArr[0];
    }

    list($encrpyt_key, $hashedPass) = encryptUserPassword(passwordToEncrypt: $password);
    $response = $newUser->registerUser(
      userData: [
        "fullname" => $fullname,
        "email" => $email,
        "username" => $username,
        "password" => $hashedPass,
        "encrypt_key" => $encrpyt_key
      ]
    );

    if ($response) {
      $this->pageData['errorMessage'] = ''; //unsetting the error message
      redirectTo(toLocation: 'login.php', replace: true);
    }
  }
}
