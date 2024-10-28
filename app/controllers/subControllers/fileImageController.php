<?php

declare(strict_types=1);

trait fileImageController
{
  protected function didUserUploadImage(array $fileImage): bool
  {
    if (!$fileImage || in_array($fileImage["tmp_name"], falsies())) {
      return false;
    }
    return true;
  }

  protected function isFileUploadedAnImage($file): bool
  {
    if (!exif_imagetype($file["tmp_name"])) {
      return false;
    }
    return true;
  }

  protected function createFileName(): string
  {
    return bin2hex(random_bytes(16));
  }

  protected function moveFileToStorageLocation(array $file, string $destination): bool
  {
    $isFileUploaded = move_uploaded_file(
      from: $file['tmp_name'],
      to: $destination
    );
    return $isFileUploaded;
  }

  private function createFolderToUploadFile(string $dir): void
  {
    if (!file_exists($dir)) {
      mkdir($dir);
    }
  }

  protected function isFileTooLarge(array $file): bool
  {
    $maxFileSize = bcmul(num1: '2', num2: (string) bcmul(num1: '1024', num2: '1024'));
    if ($file['size'] > (int) $maxFileSize) {
      return false;
    }
    return true;
  }

  protected function getFileExtension(array $file): string|bool
  {
    // attempt to get the extension of the file
    $fileName = $file['name'];
    $fileArr = explode(".", $fileName);
    $extension = end($fileArr);
    if (!$extension) {
      return false;
    }
    return $extension;
  }

  protected function getFileType(array $file): string
  {
    return $file['type'];
  }
}
