<?php

declare(strict_types=1);

class Dashboard
{
  use UserController;
  public mixed $user_session = '';
  private mixed $pageData = [];

  public function __construct()
  {
    $this->user_session = $this->session->__get('email');
  }

  public function index()
  {
    // var_dump($this->user_session);
    $this->loadUserPage('dashboard/index', [$this->user_session]);
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
