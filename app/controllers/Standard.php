<?php

declare(strict_types=1);

class Standard
{
  use Controller;

  public function index()
  {
    $this->loadPage('single-standard');
  }
}
