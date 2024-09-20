<?php

declare(strict_types=1);

class Audio
{
  use Controller;

  public function index()
  {
    $this->loadPage('single-audio');
  }
}
