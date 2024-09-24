<?php

declare(strict_types=1);
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= isset($title) ? $title : 'Blog Page'; ?></title>

  <script>
    document.documentElement.classList.remove("no-js");
    document.documentElement.classList.add("js");
  </script>

  <link rel="stylesheet" type="text/css" href="<?= requireAssets(filePath: 'css/vendor.css', version: true); ?>" />
  <link rel="stylesheet" type="text/css" href="<?= requireAssets(filePath: 'css/styles.css', version: true); ?>" />

  <link rel="apple-touch-icon" sizes="180x180" href="<?= requireAssets('images/logos/apple-touch-icon.png'); ?>" />
  <link rel="icon" type="image/png" sizes="32x32" href="<?= requireAssets('images/logos/favicon-32x32.png'); ?>" />
  <link rel="icon" type="image/png" sizes="16x16" href="<?= requireAssets('images/logos/favicon-16x16.png'); ?>" />
  <link rel="manifest" href="<?= requireAssets('../site.webmanifest'); ?>" />
</head>

<body id="top">
  <?php require_once "preloader.view.php";
