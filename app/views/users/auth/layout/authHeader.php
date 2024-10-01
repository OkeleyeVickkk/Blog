<?php

declare(strict_types=1);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="apple-touch-icon" sizes="180x180" href="<?= requireAssets('images/logos/apple-touch-icon.png'); ?>" />
  <link rel="icon" type="image/png" sizes="32x32" href="<?= requireAssets('images/logos/favicon-32x32.png'); ?>" />
  <link rel="icon" type="image/png" sizes="16x16" href="<?= requireAssets('images/logos/favicon-16x16.png'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?= requireAssets(filePath: 'css/bootstrap.min.css', version: true); ?>" />
  <link rel="stylesheet" type="text/css" href="<?= requireAssets(filePath: 'css/custom.css', version: true); ?>" />
  <title><?= isset($title) ? $title : 'Blog Page'; ?></title>
</head>

<body>
  <?php require_once(dirname(__FILE__) . '../../../components/toast.view.php'); ?>