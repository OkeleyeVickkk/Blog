<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="theme-color" content="#000" />
  <link rel="shortcut icon" href="<?= requireAssets("images/logos/favicon-16x16.png") ?>" type="image/x-icon" />
  <link rel="apple-touch-icon" sizes="32x32" href="<?= requireAssets("images/logos/favicon.ico") ?>" type="image/x-icon" />
  <link rel="shortcut icon" sizes="16x16" href="<?= requireAssets("images/logos/favicon-16x16.png") ?>" type="image/x-icon" />
  <link rel="stylesheet" type="text/css" href="<?= requireAssets("css/bootstrap.min.css") ?>" />
  <link rel=" stylesheet" type="text/css" href="<?= requireAssets("css/dashboard.default.css", true) ?>" />
  <link rel=" stylesheet" type="text/css" href="<?= requireAssets("css/general.css", true) ?>" />
  <?= isset($customPageLink) ?  $customPageLink : ''; ?>
  <link rel=" stylesheet" type="text/css" href="<?= requireAssets("css/media-query.css", true) ?>" />

  <!-- utils styles -->
  <!-- <link rel=" stylesheet" href="./assets/css/splide.min.css" /> -->
  <title><?= isset($pageTitle) ? $pageTitle : 'Dashboard'; ?></title>
</head>

<body>
  <?php require_once(dirname(__FILE__) . '../../../components/toast.view.php'); ?>