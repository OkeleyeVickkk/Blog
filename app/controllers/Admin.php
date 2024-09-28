<?php

declare(strict_types=1);

class Admin
{
  use AdminController;

  public function index($param)
  {
    if (!empty($param)) {
      $dashboard = array_shift($param);
      $page = array_shift($param);
      $this->loadAdminPage($dashboard . "/" . (isset($page) ? $page : "index"), $param);
    } else {
      $this->loadAdminPage("dashboard/index");
    }
  }
}
