<?php

declare(strict_types=1);

class Dashboard
{
  use UserController;
  function index()
  {
    $this->loadUserPage('dashboard/index');
  }

  function layout()
  {
    $this->loadUserPage("dashboard/layout");
  }
}
