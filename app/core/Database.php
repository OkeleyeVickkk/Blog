<?php

declare(strict_types=1);

trait Database
{
  private function connect(): object
  {
    try {
      $dsn = "mysql:host=" . DB['host'] . ";dbname=" . DB['name'] . ";charset=" . DB['charset'] . ";";
      $options = [
        "PDO::ATTR_DEFAULT_FETCH_MODE" => "PDO::FETCH_ASSOC",
        "PDO::ATTR_ERRMODE" => "PDO::ERRMODE_EXCEPTION",
      ];
      $connection = new PDO(
        dsn: $dsn,
        username: DB['uname'],
        password: DB['pass'],
        options: $options
      );

      return $connection;
    } catch (PDOException $error) {
      die("Error Occurred: " . $error->getMessage());
    }
  }
}
