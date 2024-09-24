<?php

require_once FIRST_PARENT_DIR . "models/User.php";

class Register
{
  use UserController;

  public function index()
  {
    $newUser = new User();

    if (strtoupper($_SERVER["REQUEST_METHOD"]) !== "POST") {
      $this->loadUserPage(filePath: 'auth/register');
      return;
    }

    $userDataArr = json_decode(file_get_contents('php://input'), true);

    $fullname = cleanString(string: $userDataArr['fullname'], type: "text");
    $email = cleanString(string: $userDataArr['email'], type: "email");
    $password = cleanString(string: $userDataArr['password'], type: "text");

    if (isFalsy($fullname)) {
      $response = array("status" => false, "message" => "Error with your input, enter something more appropriate");
      sendDataToUser(contentType: 'application/json', response: $response);
      return;
    }

    if (isFalsy($email)) {
      $response = array("status" => false, "message" => "Enter proper email address");
      sendDataToUser(contentType: 'application/json', response: $response);
      return;
    }

    if (isFalsy($password)) {
      $response = array("status" => false, "message" => "Password cannot be empty");
      sendDataToUser(contentType: 'application/json', response: $response);
      return;
    }

    if ($newUser->checkIfAccountExist(["email" => $email])) {
      $response = array("status" => false, "message" => "Email already exists");
      sendDataToUser(contentType: 'application/json', response: $response);
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
      $response = array("status" => true, "message" => "Registration successful");
      sendDataToUser(contentType: 'application/json', response: $response);
      return;
    }
  }
}
