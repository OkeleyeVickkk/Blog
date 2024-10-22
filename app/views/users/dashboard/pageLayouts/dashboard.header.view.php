<?php

declare(strict_types=1);
?>

<!-- header @::start -->
<header id="v-header-container">
  <nav class="v-header-inner d-flex align-items-center justify-content-between">
    <a href="<?= requireLink("dashboard/") ?>">
      <div class="v-logo">
        <img src="<?= requireAssets("images/logos/favicon-32x32.png") ?>" title="Spurgeon" alt="" class="img-fluid" />
      </div>
    </a>
    <div class="v-right-nav">
      <?php require_once "dashboard.navdropdown.view.php"; ?>
    </div>
  </nav>
</header>
<!-- header @::end -->