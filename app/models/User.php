<?php

declare(strict_types=1);

class User
{
  use Model;
  protected string $tableName = 'users';
  protected static $query = '';

  public function registerUser(array $userData): mixed
  {
    if (!$userData) return false;
    try {
      // 👇 this is called late static binding
      static::$query = "INSERT INTO {$this->tableName} 
               (fullName, userName, userEmail, password, encryptPassKey, isAdmin) 
               VALUES(:fullname, :username, :email, :password, :encryptPassKey, :isAdmin);";
      $responseFromCreatingNewUser = $this->execute(sqlQuery: static::$query, arr: $userData);
      if (!$responseFromCreatingNewUser) {
        throw new Exception('Error creating an account, try again!');
      }

      $this->tableName = "userProfileImage";
      static::$query = "INSERT INTO {$this->tableName} (userEmail) VALUES (:email);";
      $response = $this->execute(sqlQuery: static::$query, arr: ['email' => $userData['email']]);
      if (!$response) {
        throw new Exception("Error updating the user profile table");
      }
    } catch (\Exception $error) {
      $response = array(
        "status" => false,
        "message" => $error
      );
    }
    return $response;
  }

  public function loginUser(array $userData)
  {
    if ($userData) {
      static::$query = "SELECT * FROM {$this->tableName}
                WHERE userEmail = :email AND password = :password AND encryptPassKey = :encryptPassKey;";
      $result = $this->runQuery(sqlQuery: static::$query, arr: $userData);
      return $result;
    }
  }

  public function checkIfAccountExist(array $userData): bool
  {
    if ($userData) {
      static::$query = "SELECT * FROM {$this->tableName}
                WHERE userEmail = :email;";
      $result = (bool) $this->runQuery(sqlQuery: static::$query, arr: $userData);
      return $result;
    }
  }

  public function getUserAuthDetails(array $userData): array
  {
    if ($userData) {
      static::$query = "SELECT * FROM {$this->tableName}
                WHERE userEmail = :email AND encryptPassKey = :encryptedPass;";
      $result = $this->runQuery(sqlQuery: static::$query, arr: $userData);
      return $result;
    }
  }

  public function getUserDetails(array $userData): array
  {
    if ($userData) {
      $this->tableName = 'users';
      static::$query = "SELECT * FROM {$this->tableName}
                WHERE userEmail = :email;";
      $userResult = $this->runQuery(sqlQuery: static::$query, arr: $userData);
      // there are several ways to go about tis
      // option 1 => call one query,then another
      // option 2 => use the stored procedure to call more stuffs at once

      $this->tableName = "userProfileImage";
      static::$query = "SELECT * FROM {$this->tableName}
                        WHERE userEmail = :email;";
      $profileImageResult = $this->runQuery(sqlQuery: static::$query, arr: $userData);

      if ($profileImageResult && $userResult) {
        $totalResult = array_merge($userResult, $profileImageResult);
      }

      return $totalResult;
    }
  }

  public function updateUserLogTime(array $userData)
  {
    if (!$userData) return false;
    static::$query = "SELECT userId, userEmail, isAdmin FROM {$this->tableName} WHERE userEmail = :email;";
    $response = $this->runQuery(sqlQuery: static::$query, arr: $userData);
    if (!$response) return false;
    foreach ($response as $data) {
      $id = htmlspecialchars($data['userId']);
      $email = htmlspecialchars($data['userEmail']);
      $isAdmin = htmlspecialchars($data['isAdmin']);
    }
    $this->tableName = 'clockUserIn';
    static::$query = "INSERT INTO {$this->tableName} 
              (idOfWhoLoggedIn, userEmail, isAdmin) 
              VALUES (:userId, :userEmail, :isAdmin);";
    $result = $this->execute(
      sqlQuery: static::$query,
      arr: [
        "userId" => $id,
        "userEmail" => $email,
        "isAdmin" => $isAdmin
        // an extra instant time is part of the columns in the table of the database
      ]
    );
    return $result;
  }

  public function updateUserImage(array $userData)
  {
    $this->tableName = "userProfileImage";
    if (!$userData) return false;
    static::$query = "UPDATE {$this->tableName}
      SET name = :imageName, extension = :imageExt, type = :imageType 
      WHERE userEmail = :userEmail";
    $response = $this->execute(sqlQuery: static::$query, arr: $userData);
    return $response;
  }

  public function updateUserDetails(array $userData)
  {
    $this->tableName = "users";
    if (!$userData) return false;
    static::$query = "UPDATE {$this->tableName}
    SET fullName = :fullName, userName = :userName, phoneNumber = :phoneNumber
    WHERE userId = :userId;";

    return $this->execute(sqlQuery: static::$query, arr: $userData);
  }
}
