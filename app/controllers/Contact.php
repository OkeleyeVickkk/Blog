<?php

declare(strict_types=1);

class Contact
{
  use Controller;

  function index(): void
  {
    $this->loadPage(filePath: 'contact');
  }
}
