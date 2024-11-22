<?php

declare(strict_types=1);

require_once FIRST_PARENT_DIR . "core/Session.php";
require_once FIRST_PARENT_DIR . "controllers/subControllers/profilePage.php";
require_once FIRST_PARENT_DIR . "controllers/subControllers/blogs.php";

class Dashboard
{
  protected User $user;
  private ?string $userSession;
  protected array $userData = [];
  protected mixed $userEmail;

  use UserController, ProfilePage, Blog;

  public function __construct()
  {
    if ($this->isSessionSet()) {
      require_once FIRST_PARENT_DIR . "models/User.php";
      $this->user = new User();
      $this->userEmail = $this->userSession;
      $this->userData = $this->user->getUserDetails(userData: ["email" => $this->userEmail]);

      if (!$this->userData || !$this->userEmail) {
        redirectTo(toLocation: 'login', replace: true);
        return;
      }

      $hasChildrenArray = count($this->userData) > 1;
      if (isset($this->userData) && is_array($this->userData) && $hasChildrenArray) {
        $mergedArr = [];
        foreach ($this->userData as $subArr) {
          $mergedArr = array_merge($mergedArr, $subArr);
        }
        $this->pageData = $mergedArr;
      } else if (isset($this->userData) && is_array($this->userData) && !$hasChildrenArray) {
        $this->pageData = $this->userData;
      }
    } else {
      redirectTo(toLocation: 'login', replace: true);
    }
  }

  private function redirectBack()
  {
    header("Location: {$_SERVER['HTTP_REFERER']}");
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
    $this->pageData['allBlogs'] = $this->getBlogs();

    if (strtoupper($_SERVER['REQUEST_METHOD']) !== "POST") {
      $this->loadUserPage('dashboard/index', $this->pageData);
      return;
    }
  }

  public function blogs()
  {
    $this->pageData['pageTitle'] = "My Blogs";

    $this->pageData['myBlogs'] = $this->getMyBlogs($this->pageData);
    if (strtoupper($_SERVER['REQUEST_METHOD']) !== "POST") {
      $this->loadUserPage('dashboard/blogs', $this->pageData);
      return;
    }
  }

  public function blog()
  {
    $this->pageData['pageTitle'] = "Blog";

    if (!isset($_GET['id'])) {
      $this->redirectBack();
      return;
    }
    $blogId = htmlspecialchars($_GET['id']);
    if (!$blogId) {
      echo "Something is not right with this two";
      $this->redirectBack();
      return;
    } else {
      $response = $this->getBlogById($blogId);
      if ($response && count($response) > 0)
        $this->pageData['currentBlog'] = $response[0];
      else {
        $this->redirectBack();
      }
    }

    if (strtoupper($_SERVER['REQUEST_METHOD']) !== "POST") {
      $this->loadUserPage("dashboard/blog", $this->pageData);
      return;
    }
  }

  public function layout()
  {
    $this->pageData['pageTitle'] = "Layout";
    $this->loadUserPage("dashboard/layout", $this->pageData);
  }

  public function write()
  {
    $this->pageData['pageTitle'] = "Write";
    if (strtoupper($_SERVER['REQUEST_METHOD']) !== "POST") {
      $this->loadUserPage("dashboard/write", $this->pageData);
      return;
    }

    if ($_SERVER['HTTP_X_CUSTOM_UPDATE']) {
      match (strtolower($_SERVER['HTTP_X_CUSTOM_UPDATE'])) {
        strtolower("postBlog") => $this->postBlog(),
        strtolower("editBlog") => $this->updateBlog(),
      };
    }
  }

  public function profile()
  {
    $this->pageData['pageTitle'] = "My Profile";

    if (strtoupper($_SERVER['REQUEST_METHOD']) !== "POST") {
      $this->loadUserPage("dashboard/profile", $this->pageData);
      return;
    }

    if ($_SERVER['HTTP_X_CUSTOM_UPDATE']) {
      match (strtolower($_SERVER['HTTP_X_CUSTOM_UPDATE'])) {
        strtolower("profileImage") => $this->uploadUserImage(),
        strtolower("userDetails") => $this->updateUserDetails(),
        default => null
      };
      return;
    }
  }

  public function logout()
  {
    $session = Session::getInstance();
    if (!$session->__get(USER_SESSION)) return;
    $session->__unset(USER_SESSION);
    $isSessionDestroyed = $session->destroy();
    if ($isSessionDestroyed) {
      redirectTo(toLocation: 'login', replace: true);
    }
  }
}
