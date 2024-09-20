<?php

declare(strict_types=1);

class Index
{
  use Controller;
  public function index(array $params): void
  {
    $this->pageData = $params;
    $this->loadPage(filePath: 'index');
  }
}
