<?php

declare(strict_types=1);

class User
{
  use Model;
  protected string $tableName = 'users';

  public function registerUser(array $userData): mixed
  {
    if (!$userData) return false;
    $query = "INSERT INTO {$this->tableName} 
             (fullName, userName, userEmail, password, encryptPassKey, isAdmin) 
             VALUES(:fullname, :username, :email, :password, :encryptPassKey, :isAdmin);";
    $response = $this->execute(sqlQuery: $query, arr: $userData);
    if (!$response) {
      $response = array(
        "status" => false,
        "message" => "Error creating an account, try again!"
      );
      sendDataToUser(contentType: 'application/json', response: $response);
    };
    return $response;
  }

  public function loginUser(array $userData)
  {
    if ($userData) {
      $query =  "SELECT * FROM {$this->tableName}
                WHERE userEmail = :email AND password = :password AND encryptPassKey = :encryptPassKey;";
      $result = $this->runQuery(sqlQuery: $query, arr: $userData);
      return $result;
    }
  }

  public function checkIfAccountExist(array $userData): bool
  {
    if ($userData) {
      $query =  "SELECT * FROM {$this->tableName}
                WHERE userEmail = :email;";
      $result = (bool) $this->runQuery(sqlQuery: $query, arr: $userData);
      return $result;
    }
  }

  public function getUserDetails(array $userData): array
  {
    if ($userData) {
      $query =  "SELECT * FROM {$this->tableName}
                WHERE userEmail = :email AND encryptPassKey = :encryptedPass;";
      $result = $this->runQuery(sqlQuery: $query, arr: $userData);
      return $result;
    }
  }

  public function updateUserLogTime(array $userData)
  {
    if (!$userData) return false;
    $query = "SELECT userId, userEmail, isAdmin FROM {$this->tableName} WHERE userEmail = :email;";
    $response = $this->runQuery(sqlQuery: $query, arr: $userData);
    if (!$response) return false;
    foreach ($response as $data) {
      $id = htmlspecialchars($data['userId']);
      $email = htmlspecialchars($data['userEmail']);
      $isAdmin = htmlspecialchars($data['isAdmin']);
    }
    unset($query);
    $this->tableName = 'clockUserIn';
    $query = "INSERT INTO {$this->tableName} 
              (idOfWhoLoggedIn, userEmail, isAdmin) 
              VALUES (:userId, :userEmail, :isAdmin);";
    $result = $this->execute(
      sqlQuery: $query,
      arr: [
        "userId" => $id,
        "userEmail" => $email,
        "isAdmin" => $isAdmin
        // an extra instant time is part of the columns in the table of the database
      ]
    );
    return $result;
  }
}
