<?php

declare(strict_types=1);

require_once FIRST_PARENT_DIR . "models/User.php";

trait ProfilePage
{
  protected function uploadUserImage(): void
  {
    $profileImage = isset($_FILES['profileImage']) ? $_FILES['profileImage'] : null;
    $userEmail = isset($_POST['userEmail']) ? cleanString(string: $_POST['userEmail'], type: "email") : '';

    if (!$profileImage || in_array($profileImage["tmp_name"], falsies())) {
      sendDataToUser(
        "application/json",
        [
          "status" => false,
          "message" => "Upload an image!"
        ]
      );
      return;
    }

    if (!exif_imagetype($profileImage["tmp_name"])) {
      sendDataToUser(
        "application/json",
        [
          "status" => false,
          "message" => "Image must be of type .png, .avif, .jpeg, .webp, .jpeg!"
        ]
      );
      return;
    }

    $maxFileSize = bcmul(num1: '2', num2: (string) bcmul(num1: '1024', num2: '1024'));
    if ($profileImage['size'] > (int) $maxFileSize) {
      sendDataToUser(
        "application/json",
        [
          "status" => false,
          "message" => "File size cannot be more than 2MB!"
        ]
      );
      return;
    }

    $uploadImagesDir = FIRST_PARENT_DIR . "../public/assets/users/";
    if (!file_exists($uploadImagesDir)) {
      mkdir(FIRST_PARENT_DIR . "../public/assets/users/");
    }

    // attempt to get the extension of the file
    $fileName = $profileImage['name'];
    $fileArr = explode(".", $fileName);
    $extension = end($fileArr);

    // give the file a new name to prevent attacks;
    $fileName = bin2hex(random_bytes(16));
    $userData = [
      "userEmail" => $userEmail,
      "imageName" => $fileName,
      "imageExt" =>  $extension,
      "imageType" => $profileImage['type']
    ];

    $user = new User();
    $response = $user->updateUserImage(userData: $userData);
    if ($response) {
      $uploadToImageFolderStatus = move_uploaded_file(
        from: $profileImage['tmp_name'],
        to: $uploadImagesDir . $fileName . "." . $extension
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
        response: [
          "status" => false,
          "message" => "Please fill in all fields correctly."
        ]
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
        response: [
          "status" => false,
          "message" => "Error trying to update profile,try again!"
        ]
      );
      return;
    }
    sendDataToUser(
      contentType: 'application/json',
      response: [
        "status" => true,
        "message" => "Success"
      ]
    );
  }
}
