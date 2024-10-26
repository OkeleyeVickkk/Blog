<?php

declare(strict_types=1);

require_once FIRST_PARENT_DIR . "core/Session.php";
require_once FIRST_PARENT_DIR . "controllers/subControllers/profilePage.php";

class Dashboard
{
  private User $user;
  private ?string $userSession;

  use UserController;
  use ProfilePage;

  public function __construct()
  {
    if ($this->isSessionSet()) {
      require_once FIRST_PARENT_DIR . "models/User.php";
      $this->user = new User();
      $userEmail = $this->userSession;
      $response = $this->user->getUserDetails(userData: ["email" => $userEmail]);

      if (!$response || !$userEmail) {
        redirectTo(toLocation: 'login', replace: true);
        return;
      }

      if (isset($response) && is_array($response)) {
        $mergedArr = [];
        foreach ($response as $subArr) {
          $mergedArr = array_merge($mergedArr, $subArr);
        }
        $this->pageData = $mergedArr;
      }
    } else {
      redirectTo(toLocation: 'login', replace: true);
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
    $this->pageData['pageTitle'] = "Home";
    $this->loadUserPage('dashboard/index', $this->pageData);
  }

  public function blogs()
  {
    $this->pageData['pageTitle'] = "Blogs";
    $this->loadUserPage('dashboard/blogs', $this->pageData);
  }

  public function layout()
  {
    $this->pageData['pageTitle'] = "Layout";
    $this->loadUserPage("dashboard/layout", $this->pageData);
  }

  public function write()
  {
    $this->pageData['pageTitle'] = "Write";
    $this->loadUserPage("dashboard/write", $this->pageData);
  }

  public function profile()
  {
    $this->pageData['pageTitle'] = "My Profile";
    if (strtoupper($_SERVER['REQUEST_METHOD']) !== "POST") {
      $this->loadUserPage("dashboard/profile", $this->pageData);
      return;
    }

    match (strtolower($_SERVER['HTTP_X_CUSTOM_UPDATE'])) {
      strtolower("profileImage") => $this->uploadUserImage(),
      strtolower("userDetails") => $this->updateUserDetails(),
    };
  }
}
