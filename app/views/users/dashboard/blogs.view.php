<?php

declare(strict_types=1);

$customPageLink = [
  "<link rel='stylesheet' type='text/css' href='" . requireAssets('css/blogs.css', true) . "'></link>",
];

require_once "pageLayouts/dashboard.meta.view.php"; ?>
<!-- header @::start -->
<div class="v-body-wrapper">
  <?php require_once "pageLayouts/dashboard.header.view.php" ?>
  <!-- header @::end -->
  <!-- main @::start -->
  <section id="v-main">
    <!-- sidebar @::start -->
    <?php require_once "pageLayouts/dashboard.sidebar.view.php" ?>
    <!-- sidebar @::end -->
    <main class="v-main-content bg-white">
      <div class="v-main-content-inner col-lg-11 col-xl-11 mx-auto">
        <div class="p-0">
          <?php require_once "pageLayouts/dashboard.pageTitle.view.php" ?>
        </div>
        <div class="v-main-content-inner col-12 row mt-5 m-0 justify-content-between mx-auto position-relative">
          <div class="v-page-wrapper p-0 pb-5 position-relative">
            <div class="v-blog-container">
              <?php
              $thereIsBlog = isset($pageData['myBlogs']);
              if ($thereIsBlog && count($pageData['myBlogs']) > 0) {
                $blogsArr = $pageData['myBlogs']; ?>
                <ul class="v-blogs-grid-container">
                  <?php foreach ($blogsArr as $blog) { ?>
                    <li class="v-each-blog-post">
                      <a href="<?= requireLink("dashboard/blog?id={$blog['blogId']}"); ?>">
                        <figure class="v-blog-image border d-flex  justify-content-center ratio-16x9 overflow-hidden">
                          <img src="<?= requireAssets("blogs/{$blog['blog_image']}.{$blog['blog_image_ext']}"); ?>" alt="" class="img-fluid flex-grow-1 object-fit-cover" />
                        </figure>
                      </a>
                      <div class="v-blog-content">
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="d-flex align-items-center v-post-data flex-grow-1">
                            <span class="v-author-image">
                              <img src="
                              <?= isset($pageData['name'])
                                ? requireAssets(filePath: "users/{$pageData['name']}.{$pageData['extension']}")
                                : requireAssets(filePath: "images/avatars/user-avatar.webp"); ?>
                              " alt="" class="img-fluid">
                            </span>
                            <span class="fw-medium v-text align-middle d-flex align-items-center justify-content-between column-gap-1">
                              <span><?= implode(" ", splitString($blog['author_name'], ' ', 1)) ?></span>
                              <span class="d-none d-sm-inline"> &CenterDot; </span>
                              <span class="ms-auto"><?= formatDate(date: $blog['created_at']) ?></span>
                            </span>
                          </div>
                        </div>
                        <a href="<?= requireLink("dashboard/blog?id=" . $blog['blogId']); ?>">
                          <div class="d-flex align-items-start column-gap-4 justify-content-between mt-2">
                            <h5 class="v-title"><?= $blog['blog_title'] ?></h5>
                            <span class="v-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="384" height="384" viewBox="0 0 24 24">
                                <rect width="24" height="24" fill="none" />
                                <path
                                  fill="none"
                                  stroke="currentColor"
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="1.5"
                                  d="M7 7h10m0 0v10m0-10L7 17" />
                              </svg>
                            </span>
                          </div>
                          <span class="v-subtitle opacity-75">
                            <?= $blog['blog_subtitle'] ?>
                          </span>
                        </a>
                      </div>
                    </li>
                  <?php } ?>
                </ul>
              <?php } else { ?>
                <div class="d-flex align-items-center flex-column row-gap-4 justify-content-center m-auto">
                  <figure class="v-image" style="max-width: 500px; width: 100%">
                    <img src="<?= requireAssets('images/8087e5d3976a556ba5982cdffdb4b6123.png'); ?>" alt="" class="img-fluid">
                  </figure>
                  <div class="d-flex align-items-center flex-column row-gap-4 justify-content-center">
                    <h4>You haven't published anything yet!</h4>
                    <div>
                      <a href="<?= requireLink('dashboard/write'); ?>" class="v-action-btn">Write a blog</a>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </main>
  </section>
</div>

<?php require_once "pageLayouts/dashboard.footer.view.php"; ?>