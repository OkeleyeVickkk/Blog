<?php

declare(strict_types=1);

class _404
{
  use UserController;

  public function index()
  {
    $this->loadUserPage('404');
  }
}
