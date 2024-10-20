<?php

declare(strict_types=1);

trait UserController
{
  protected array $pageData = [];
  protected string $dataType = 'application/json';

  private function loadUserPage(string $filePath = 'index', array $pageData = []): void
  {
    $viewsFolder = FIRST_PARENT_DIR  . "views/users/";
    $fileName = $viewsFolder . $filePath . '.view.php';
    if (file_exists($fileName)) {
      require_once $fileName;
    } else {
      require_once $viewsFolder . '404.view.php';
    }
  }
}
