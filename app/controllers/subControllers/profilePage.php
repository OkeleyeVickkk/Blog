<?php

declare(strict_types=1);

require_once FIRST_PARENT_DIR . "models/User.php";

trait ProfilePage
{
  protected function uploadUserImage()
  {
    $profileImage = isset($_FILES['profileImage']) ? $_FILES['profileImage'] : null;
    $userEmail = isset($_POST['userEmail']) ? cleanString(string: $_POST['userEmail'], type: "email") : '';

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
    $result = [
      "userEmail" => $userEmail,
      "imageName" => $fileName,
      "imageExt" =>  $extension,
      "imageType" => $profileImage['type']
    ];

    $user = new User();
    $response = $user->updateUserBasicProfile(userData: $result);
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
}
