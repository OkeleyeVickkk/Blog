<?php

declare(strict_types=1);

trait Model
{
  use Database;
  protected string $tableName = "users";

  //execute does select
  public function runQuery(string $sqlQuery, array $arr = []): array
  {
    try {
      if ($sqlQuery) {
        $connection = $this->connect();
        $statement = $connection->prepare($sqlQuery);
        !empty($arr) ? $statement->execute($arr) : $statement->execute();
        $result = $statement->fetchAll();
        return $result;
      }
    } catch (\Exception $error) {
      die($error->getMessage());
    }
  }

  //execute does insert, delete, update
  public function execute(string $sqlQuery, array $arr = []): bool
  {
    try {
      if ($sqlQuery) {
        $connection = $this->connect();
        $statement = $connection->prepare($sqlQuery);
        $response = !empty($arr) ? $statement->execute($arr) : $statement->execute();
        return $response;
      }
    } catch (\Exception $error) {
      die($error->getMessage());
    }
  }
}
