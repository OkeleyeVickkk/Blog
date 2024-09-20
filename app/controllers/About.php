<?php

declare(strict_types=1);

class About
{
  use Controller;

  function index(): void
  {
    $this->loadPage('about');
  }
}
