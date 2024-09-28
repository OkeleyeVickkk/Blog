<?php

declare(strict_types=1);

class App
{
  protected string $controller = "Index";
  protected string $method = "index";
  protected array $params = [];

  public function __construct()
  {
    $this->initializeController();
  }

  private function getUrlIntoArr(): array
  {
    $url = isset($_GET['q']) ? $_GET['q'] : "index";
    if (str_contains($url, '.php')) {
      $url = implode('', explode('.php', $url));
    }
    $urlArr = explode('/', filter_var(rtrim($url, '/'), FILTER_SANITIZE_URL));
    return $urlArr;
  }

  private function initializeController(): void
  {
    $resultingArr = $this->getUrlIntoArr();
    $controllerFile = ucfirst(!empty($resultingArr[0]) ? $resultingArr[0] : 'index');
    $controllersFolder = FIRST_PARENT_DIR  . "controllers/";
    $fileName = $controllersFolder . $controllerFile . '.php';
    if (file_exists($fileName)) {
      require_once $fileName;
      $this->controller = $controllerFile;
      unset($resultingArr[0]); // remove the controller from the url arr
    } else {
      $this->controller = "_404";
      require_once $controllersFolder . '_404.php';
    }

    if (isset($resultingArr[1])) {
      $result = explode(".", $resultingArr[1]); //if there exist .html, .php or anything like so after the controller
      if (method_exists($this->controller, $result[0])) {
        $this->method = $result[0];
        unset($resultingArr[1]);
      }
    }
    $this->params = $resultingArr ? array_values($resultingArr) : [];
    $controllerBeingUsed = new $this->controller;
    call_user_func_array([$controllerBeingUsed, $this->method], [$this->params]);
  }
}
