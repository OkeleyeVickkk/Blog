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

function cleanString(string $string, mixed $type = "text"): mixed
{
  if (empty($string)) return false;
  $data = trim($string);
  $data = stripslashes($data);

  switch (strtolower($type)) {
    case "email":
      $resultFromCheck = filter_var($data, FILTER_VALIDATE_EMAIL);
      if (!$resultFromCheck) {
        $data = false;
        return false;
      }
      break;
    case "number":
      $number = intval($data);
      $resultFromCheck = filter_var($number, FILTER_VALIDATE_INT);
      if (!$resultFromCheck) {
        $data = false;
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

function sendDataToUser(string $contentType, array $response = []): void
{
  $contentType = strtolower($contentType);
  header("Content-Type: " . ($contentType !== 'application' ? $contentType : 'application/json'));
  echo $contentType !== 'application/json' ? $response : json_encode($response);
}

function splitString(string $stringChars, string $separator = null, int $returnAmount = 1)
{
  if ($separator === null) {
    $resultArr = explode(' ', $stringChars);
  } else {
    $resultArr = explode($separator, $stringChars);
  }
  return array_splice($resultArr, $returnAmount);
}


function formatDate(string $date): string
{
  if ($date) {
    $date = explode(" ", $date)[0];
    $formattedDate = date("d M, Y", strtotime($date));
  }
  return $formattedDate;
}
