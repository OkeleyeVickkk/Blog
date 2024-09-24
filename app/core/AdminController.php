<?php

declare(strict_types=1);

trait AdminController
{
  function loadAdminPage(string $path = "index")
  {
    $viewsFolder = FIRST_PARENT_DIR  . "views/admin/";
    $fileName = $viewsFolder . $path . '.view.php';
    if (file_exists($fileName)) {
      require_once $fileName;
    } else {
      require_once $viewsFolder . '404.view.php';
    }
  }
}
