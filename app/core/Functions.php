<?php

function preIt(mixed $data): void
{
  if (!isset($data)) return;
  echo "<pre>";
  var_dump($data);
  echo "<pre>";
}

function requireAssets(string $filePath, bool $version = false): string
{
  if (!isset($filePath)) die("Cannot access file");
  $path =  ROOT_PATH . 'assets/' . $filePath . ($version ? '?ver=' . time() : '');
  return $path;
}

function requireLink(string $link): string
{
  if (!isset($link)) die("Enter a link");
  $link =  ROOT_PATH  . $link;
  return $link;
}

function falsies(): array
{
  return ["", false, null, 0, 0.0, [], "0"];
}

function isFalsy(mixed $data): bool
{
  return in_array($data, falsies());
}

function cleanString(string $string, mixed $type = "text"): bool|null|string
{
  if (empty($string)) die("Error, string cannot be empty");
  $data = (string) trim($string);
  $data = stripslashes($data);

  switch (strtolower($type)) {
    case "email":
      $data = filter_var($data, FILTER_VALIDATE_EMAIL);
      if (isFalsy(data: $data)) {
        die("Enter a proper email address");
      }
      break;
    case "text":
      $data = htmlspecialchars($data);
      break;
    default:
      $data = htmlspecialchars($data);
      break;
  }

  return $data;
}

function encryptUserPassword(string $passwordToEncrypt): array|string
{
  $passwordKey = hash("sha256", $passwordToEncrypt);
  $hashedPass = password_hash($passwordToEncrypt, PASSWORD_DEFAULT);

  return [$passwordKey, $hashedPass];
}

function decryptUserPassword(string $passwordToDecrypt, string $hash): bool
{
  if (!empty($passwordToDecrypt) && !empty($hash)) {
    $result = password_verify($passwordToDecrypt, $hash);
  }
  return $result;
}

function redirectTo(string $toLocation, bool $replace = false): void
{
  header(
    "Location:" . ROOT_PATH . $toLocation .  "",
    replace: $replace,
  );
}

function generateRandomString(int $stringLength = 5): string
{
  $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  $totalRandomChars = '';

  while (strlen($totalRandomChars) < $stringLength) {
    $randomInt = mt_rand(0, strlen(trim($chars)) - 1);
    $totalRandomChars .= $chars[$randomInt];
  }

  return $totalRandomChars;
}
