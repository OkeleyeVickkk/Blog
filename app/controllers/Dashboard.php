<?php

declare(strict_types=1);

require_once FIRST_PARENT_DIR . "core/Session.php";
require_once FIRST_PARENT_DIR . "controllers/subControllers/profilePage.php";
require_once FIRST_PARENT_DIR . "controllers/subControllers/blogs.php";

class Dashboard
{
  private User $user;
  private ?string $userSession;
  private array $userData = [];

  use UserController, ProfilePage, Blog;

  public function __construct()
  {
    if ($this->isSessionSet()) {
      require_once FIRST_PARENT_DIR . "models/User.php";
      $this->user = new User();
      $userEmail = $this->userSession;
      $this->userData = $this->user->getUserDetails(userData: ["email" => $userEmail]);

      if (!$this->userData || !$userEmail) {
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
    $this->pageData['pageTitle'] = "My Blogs";
    $this->pageData['myBlogs'] = $this->getMyBlogs($this->pageData);

    $this->loadUserPage('dashboard/blogs', $this->pageData);
  }

  public function blog()
  {
    $this->pageData['pageTitle'] = "Blog";
    if (!isset($_SERVER['HTTP_REFERER'])) {
      echo "<script>window.history.back()</script>";
      return;
    }
    if (!isset($_GET['id'])) {
      header("Location: {$_SERVER['HTTP_REFERER']}");
      return;
    }
    $blogId = $_GET['id'];
    $blogId = htmlspecialchars($blogId);

    if ($blogId) {
      $response = $this->getBlogById($blogId);
      $this->pageData['currentBlog'] = $response[0];
    }

    $this->loadUserPage('dashboard/blog', $this->pageData);
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
      };
    }
  }

  public function savedBlogs()
  {
    $this->pageData['pageTitle'] = "Saved Blogs";

    $this->loadUserPage("dashboard/saved-blogs", $this->pageData);
  }
}
