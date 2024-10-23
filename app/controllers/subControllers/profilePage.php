<?php

declare(strict_types=1);

require_once FIRST_PARENT_DIR . "models/User.php";

trait ProfilePage
{
  protected function uploadUserImage()
  {
    $profileImage = isset($_FILES['profileImage']) ? $_FILES['profileImage'] : null;
    $fullName = isset($_POST['fullName']) ? cleanString(string: $_POST['fullName'], type: "text") : '';
    $userEmail = isset($_POST['userEmail']) ? cleanString(string: $_POST['userEmail'], type: "email") : '';
    $userName = isset($_POST['userName']) ? cleanString(string: $_POST['userName'], type: "text") : '';
    $phoneNo = isset($_POST['phoneNo']) ? cleanString(string: $_POST['phoneNo'], type: "number") : '';
    $userId = $_POST['userId'];

    if (!$profileImage || in_array($profileImage["tmp_name"], falsies())) {
      sendDataToUser("application/json", [
        "status" => false,
        "message" => "Upload an image!"
      ]);
      return;
    }

    if (!exif_imagetype($profileImage["tmp_name"])) {
      sendDataToUser("application/json", [
        "status" => false,
        "message" => "Image must be of type .png, .avif, .jpeg, .webp, .jpeg!"
      ]);
      return;
    }

    $maxFileSize = bcmul(num1: '2', num2: (string) bcmul(num1: '1024', num2: '1024'));
    if ($profileImage['size'] > (int) $maxFileSize) {
      sendDataToUser("application/json", [
        "status" => false,
        "message" => "File size cannot be more than 2MB!"
      ]);
      return;
    }

    $uploadImagesDir = FIRST_PARENT_DIR . "../public/assets/uploadedImages/";
    if (!file_exists($uploadImagesDir)) {
      mkdir(FIRST_PARENT_DIR . "../public/assets/uploadedImages/");
    }

    $result = [
      "userEmail" => $userEmail,
      "imageName" => $profileImage['name'],
      "imageExt" => $profileImage['type']
    ];

    $user = new User();
    $response = $user->updateUserBasicProfile(userData: $result);
    if ($response) {
      $uploadToImageFolderStatus = move_uploaded_file(
        from: $profileImage['tmp_name'],
        to: $uploadImagesDir . $profileImage['name']
      );

      if ($uploadToImageFolderStatus) {
        sendDataToUser(
          "application/json",
          [
            "status" => true,
            "message" => "Image Uploaded successfully"
          ]
        );
        return;
      }
    }
  }
}
