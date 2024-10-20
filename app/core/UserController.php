<?php

declare(strict_types=1);

trait UserController
{
  public array $pageData = [];
  protected string $dataType = 'application/json';
  public Session $session;

  public function __construct()
  {
    $this->session = Session::getInstance();
  }

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
