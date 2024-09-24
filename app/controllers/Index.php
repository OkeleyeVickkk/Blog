<?php

declare(strict_types=1);

class Index
{
  use UserController;

  public function index(array $params): void
  {
    $this->loadUserPage(filePath: 'index');
  }
}
