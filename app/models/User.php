<?php

declare(strict_types=1);

class User
{
  use Model;
  protected string $tableName = 'users';

  public function registerUser(array $userData): mixed
  {
    if (!$userData) return false;
    $query =
      "INSERT INTO {$this->tableName} (fullname, user_name, user_email, password, encrypt_pass_key) 
         VALUES(:fullname, :username, :email, :password, :encrypt_pass_key);";
    $response = $this->execute(sqlQuery: $query, arr: $userData);
    if (!$response) die("Error occured from the user model");
    return $response;
  }

  public function loginUser(array $userData)
  {
    if ($userData) {
      $query =
        "SELECT * FROM {$this->tableName}
        WHERE user_email = :email AND password = :password AND encrypt_pass_key = :encrypt_pass_key;";

      $result = $this->runQuery(sqlQuery: $query, arr: $userData);
      return $result;
    }
  }

  public function checkIfAccountExist(array $userData): bool
  {
    if ($userData) {
      $query =
        "SELECT * FROM {$this->tableName}
        WHERE user_email = :email;";

      $result = (bool) $this->runQuery(sqlQuery: $query, arr: $userData);
      return $result;
    }
  }

  public function getUserDetails(array $userData): array
  {
    if ($userData) {
      $query =
        "SELECT * FROM {$this->tableName}
       WHERE user_email = :email AND encrypt_pass_key = :encrypted_pass;";

      $result = $this->runQuery(sqlQuery: $query, arr: $userData);
      return $result;
    }
  }

  public function updateUserLogTime(array $userData)
  {
    if (!$userData) return false;
    $query = "SELECT user_id FROM {$this->tableName} WHERE user_email = :email;";
    $response = $this->runQuery(sqlQuery: $query, arr: $userData);
    if (!$response) return false;
    foreach ($response as $data) {
      $id = htmlspecialchars($data['user_id']);
    }
    unset($query);
    $this->tableName = 'logtimein';
    $query = "INSERT INTO {$this->tableName} (user_id) VALUES (:user_id);";
    $result = $this->execute(sqlQuery: $query, arr: ["user_id" => $id]);

    return $result;
  }
}
