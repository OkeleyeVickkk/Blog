<?php

declare(strict_types=1);

class Video
{
  use Controller;

  public function index()
  {
    $this->loadPage('single-video');
  }
}
