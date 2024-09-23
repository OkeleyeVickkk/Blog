<?php

declare(strict_types=1);
?>
<header id="masthead" class="s-header">
  <div class="s-header__branding">
    <p class="site-title">
      <a href="<?= requireLink(link: 'index'); ?>" rel="home">Spurgeon.</a>
    </p>
  </div>

  <div class="row s-header__navigation">
    <nav class="s-header__nav-wrap">
      <h3 class="s-header__nav-heading">Navigate to</h3>

      <ul class="s-header__nav">
        <li class="current-menu-item"><a href="<?= requireLink(link: 'index'); ?>">Home</a></li>
        <li class="has-children">
          <a role="button">Categories</a>
          <ul class="sub-menu">
            <li><a href="<?= requireLink(link: 'category'); ?>">Design</a></li>
          </ul>
        </li>
        <li class="has-children">
          <a role="button">Blog</a>
          <ul class="sub-menu">
            <li><a href="<?= requireLink(link: 'standard'); ?>">Standard Post</a></li>
            <li><a href="<?= requireLink(link: 'video'); ?>">Video Post</a></li>
            <li><a href="<?= requireLink(link: 'audio'); ?>">Audio Post</a></li>
          </ul>
        </li>
        <!-- <li><a href=" <?= requireLink(link: 'styles'); ?>">Styles</a></li> -->
        <li><a href="<?= requireLink(link: 'contact'); ?>">Contact</a></li>
        <li><a href="<?= requireLink(link: 'create'); ?>">Write</a></li>
        <?php if (!$this->session->__isset("user")): ?>
          <li><a href="<?= requireLink(link: 'login'); ?>">Login</a></li>
        <?php endif; ?>
      </ul>
      <!-- end s-header__nav -->
    </nav>
    <!-- end s-header__nav-wrap -->
  </div>
  <!-- end s-header__navigation -->

  <?php require_once "searchbar.view.php"; ?>
  <!-- end s-header__search -->

  <a class="s-header__menu-toggle" href="#0"><span>Menu</span></a>
  <a class="s-header__search-trigger" href="#">
    <svg width="24" height="24" fill="none" viewBox="0 0 24 24">
      <path
        stroke="currentColor"
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="1.5"
        d="M19.25 19.25L15.5 15.5M4.75 11C4.75 7.54822 7.54822 4.75 11 4.75C14.4518 4.75 17.25 7.54822 17.25 11C17.25 14.4518 14.4518 17.25 11 17.25C7.54822 17.25 4.75 14.4518 4.75 11Z"></path>
    </svg>
  </a>
</header>
<!-- end s-header -->