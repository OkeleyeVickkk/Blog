<?php

declare(strict_types=1);

class _404
{
  use Controller;

  public function index()
  {
    $this->loadPage('404');
  }
}
