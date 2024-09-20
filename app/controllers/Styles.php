<?php

declare(strict_types=1);

class Styles
{
  use Controller;

  public function index()
  {
    $this->loadPage('styles');
  }
}
