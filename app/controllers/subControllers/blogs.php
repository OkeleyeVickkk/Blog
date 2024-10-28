<?php

declare(strict_types=1);

require_once FIRST_PARENT_DIR . "models/User.php";
require_once "fileImageController.php";

trait Blog
{
  use fileImageController;

  protected function postBlog()
  {
    $blogTitle = isset($_POST['blogTitle']) ? cleanString(string: $_POST['blogTitle'], type: "text") : '';
    $blogSubtitle = isset($_POST['blogSubtitle']) ? cleanString(string: $_POST['blogSubtitle'], type: "text") : '';
    $blogContent = isset($_POST['blogContent']) ? cleanString(string: $_POST['blogContent'], type: "text") : '';
    $authorName = isset($_POST['authorName']) ? cleanString(string: $_POST['authorName'], type: "text") : '';
    $blogFile = isset($_FILES['bannerImage']) ? $_FILES['bannerImage'] : null;
    $authorId = isset($_POST['authorId']) ? cleanString(string: $_POST['authorId'], type: "number") : '';

    if (!$blogContent || !$blogTitle || !$blogFile || !$authorId || !$authorName) {
      sendDataToUser("application/json", array("status" => false, "message" => "Error occurred, try again!"));
      return;
    }
    if (!$blogTitle) {
      sendDataToUser("application/json", array("status" => false, "message" => "Enter a blog title"));
      return;
    }
    if (!$blogContent) {
      sendDataToUser("application/json", array("status" => false, "message" => "You cannot publish a  blog without a blog content"));
      return;
    }

    // deal with file image
    if (!$this->didUserUploadImage(fileImage: $blogFile)) {
      sendDataToUser("application/json", array("status" => false, "message" => "Upload an image!"));
      return;
    }

    if (!$this->isFileUploadedAnImage(file: $blogFile)) {
      sendDataToUser("application/json", array("status" => false, "message" => "Image must be of type .png, .avif, .jpeg, .webp, .jpeg!"));
      return;
    }

    if (!$this->isFileTooLarge(file: $blogFile)) {
      sendDataToUser("application/json", array("status" => false, "message" => "File size cannot be more than 2MB!"));
      return;
    }

    $uploadImagesDir = FIRST_PARENT_DIR . "../public/assets/blogs/";
    $this->createFolderToUploadFile(dir: $uploadImagesDir);

    $fileExt = $this->getFileExtension(file: $blogFile);
    if (!$fileExt) {
      sendDataToUser("application/json", array("status" => false, "message" => "File uploaded doesn't have an extension and thus cannot be uploaded!"));
      return;
    }
    // give the file a new name to prevent attacks;
    $fileName = $this->createFileName();

    $userData = [
      "blogImage" => $fileName,
      "authorId" => $authorId,
      "blogTitle" => $blogTitle,
      "authorName" => $authorName,
      "blogSubtitle" => $blogSubtitle,
      "blogContent" => $blogContent,
      "blogImageExt" =>  $fileExt,
      "blogImageType" => $this->getFileType(file: $blogFile)
    ];

    $user = new User();
    $response = $user->postUserBlog(userData: $userData);
    if ($response) {
      $fileNameToDestination = $uploadImagesDir . $fileName . "." . $fileExt;
      $uploadStatus = $this->moveFileToStorageLocation(file: $blogFile, destination: $fileNameToDestination);

      if ($uploadStatus) {
        sendDataToUser("application/json", array("status" => true, "message" => "Blog published successfully"));
        return;
      }
    }
  }
  protected function updateBlog() {}

  protected function getAllBlogs() {}
  protected function getBlogById($userData)
  {
    if ($userData) {
      $user = new User;
    }
    // $response = $user->getUserBlogs(userData: array("userId" => $userData['userId']));
  }

  protected function getMyBlogs($userData)
  {
    if ($userData) {
      $user = new User();
      $response = $user->getUserBlogs(userData: array("userId" => $userData['userId']));
      if (!$response) return [];
      return $response;
    }
  }
}
