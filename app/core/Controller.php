<?php

declare(strict_types=1);

trait Controller
{
  public array $pageData = [];

  private function loadPage(string $filePath = 'index'): void
  {
    $viewsFolder = FIRST_PARENT_DIR  . "views/";
    $fileName = $viewsFolder . $filePath . '.view.php';
    if (file_exists($fileName)) {
      require_once $fileName;
    } else {
      require_once $viewsFolder . '404.view.php';
    }
  }
}
