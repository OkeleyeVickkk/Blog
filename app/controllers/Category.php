<?php

declare(strict_types=1);

class Category
{
  use Controller;
  function index(): void
  {
    $this->loadPage(filePath: 'category');
  }
}
