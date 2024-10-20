<?php

declare(strict_types=1);

class Dashboard
{
  use UserController;

  public function index()
  {
    $this->loadUserPage('dashboard/index', []);
  }

  public function layout()
  {
    $this->loadUserPage("dashboard/layout");
  }

  public function write()
  {
    $this->loadUserPage("dashboard/write");
  }
}
