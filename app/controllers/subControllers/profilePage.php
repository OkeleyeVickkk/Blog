<?php

declare(strict_types=1);

require_once FIRST_PARENT_DIR . "models/User.php";
require_once "fileImageController.php";

trait ProfilePage
{
  use fileImageController;

  protected function uploadUserImage(): void
  {
    $profileImage = isset($_FILES['profileImage']) ? $_FILES['profileImage'] : null;
    $userEmail = isset($_POST['userEmail']) ? cleanString(string: $_POST['userEmail'], type: "email") : '';

    if (!$this->didUserUploadImage(fileImage: $profileImage)) {
      sendDataToUser("application/json", array("status" => false, "message" => "Upload an image!"));
      return;
    }

    if (!$this->isFileUploadedAnImage(file: $profileImage)) {
      sendDataToUser("application/json", array("status" => false, "message" => "Image must be of type .png, .avif, .jpeg, .webp, .jpeg!"));
      return;
    }

    if (!$this->isFileTooLarge(file: $profileImage)) {
      sendDataToUser("application/json", array("status" => false, "message" => "File size cannot be more than 2MB!"));
      return;
    }

    $uploadImagesDir = FIRST_PARENT_DIR . "../public/assets/users/";
    $this->createFolderToUploadFile(dir: $uploadImagesDir);

    $fileExt = $this->getFileExtension(file: $profileImage);
    if (!$fileExt) {
      sendDataToUser("application/json", array("status" => false, "message" => "File uploaded doesn't have an extension and thus cannot be uploaded!"));
      return;
    }
    // give the file a new name to prevent attacks;
    $fileName = $this->createFileName();

    $userData = [
      "userEmail" => $userEmail,
      "imageName" => $fileName,
      "imageExt" =>  $fileExt,
      "imageType" => $this->getFileType(file: $profileImage)
    ];

    $user = new User();
    $response = $user->updateUserImage(userData: $userData);
    if ($response) {
      $fileNameToDestination = $uploadImagesDir . $fileName . "." . $fileExt;
      $uploadStatus = $this->moveFileToStorageLocation(file: $profileImage, destination: $fileNameToDestination);

      if ($uploadStatus) {
        sendDataToUser("application/json", array("status" => true, "message" => "Image Uploaded successfully"));
        return;
      }
    }
  }

  protected function updateUserDetails(): void
  {

    $fullName = isset($_POST['fullName']) ? cleanString(string: $_POST['fullName'], type: "text") : '';
    $userName = isset($_POST['userName']) ? cleanString(string: $_POST['userName'], type: "text") : '';
    $phoneNumber = isset($_POST['phone']) ? cleanString(string: $_POST['phone'], type: "number") : '';
    $userId = isset($_POST['userId']) ? cleanString(string: $_POST['userId'], type: "text") : '';

    // Check if all fields are filled properly
    if (empty($fullName) || empty($userName) || empty($phoneNumber) || empty($userId)) {
      sendDataToUser(
        contentType: 'application/json',
        response: array("status" => false, "message" => "Please fill in all fields correctly.")
      );
      return;
    }
    $user = new User();


    $userData = [
      'fullName' => $fullName,
      'userName' => $userName,
      'phoneNumber' => $phoneNumber,
      'userId' => $userId,
    ];

    $result = $user->updateUserDetails(userData: $userData);
    if (!$result) {
      sendDataToUser(
        contentType: 'application/json',
        response: array("status" => false, "message" => "Error trying to update profile, try again!")
      );
      return;
    }
    sendDataToUser(
      contentType: 'application/json',
      response: array("status" => true, "message" => "Success")
    );
  }
}
