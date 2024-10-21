<?php

declare(strict_types=1);

require_once FIRST_PARENT_DIR . "core/Session.php";

class Dashboard
{
  use UserController;
  private User $user;
  private $userSession;


  public function __construct()
  {
    if ($this->isSessionSet()) {
      require_once FIRST_PARENT_DIR . "models/User.php";
      $this->user = new User();
      $userEmail = $this->userSession;
      $this->user->updateUserLogTime(userData: ["email" => $userEmail]);

      $response = $this->user->getUserDetails(userData: ["email" => $userEmail]);
      if (isset($response)) {
        $this->pageData = $response;
      }
    } else {
      redirectTo(toLocation: 'login');
    }
  }

  private function isSessionSet(): bool
  {
    if (!Session::getInstance()->__get(USER_SESSION)) {
      return false;
    }
    $this->userSession = Session::getInstance()->__get(USER_SESSION);
    return true;
  }

  public function index()
  {
    $this->loadUserPage('dashboard/index');
  }

  public function layout()
  {
    $this->loadUserPage("dashboard/layout");
  }

  public function write()
  {
    $this->loadUserPage("dashboard/write");
  }

  public function profile()
  {
    $this->loadUserPage("dashboard/profile");
  }
}
