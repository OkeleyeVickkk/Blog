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
      <div class="v-main-content-inner col-lg-11 col-xl-6 mx-auto">
        <div class="v-main-content-inner col-12 row mt-3 m-0 justify-content-between mx-auto position-relative">
          <div class="v-page-wrapper v-blog-page p-0 pb-5 position-relative">
            <div class="v-blog-container">
              <div class="v-each-blog-post" style="--profile-image-radius: 2.8rem">
                <div class="v-blog-content">
                  <?php
                  // preIt($pageData);
                  $currentBlog = $pageData['currentBlog'];
                  ?>
                  <div class="d-flex align-items-start flex-column column-gap-4 row-gap-3 justify-content-between">
                    <h1 class="v-title"><?= htmlspecialchars($currentBlog['blog_title']) ?></h1>
                    <?php if (!empty($currentBlog['blog_subtitle'])): ?>
                      <span class="v-main-subtext opacity-75">
                        <?= htmlspecialchars($currentBlog['blog_subtitle']) ?>
                      </span>
                    <?php endif; ?>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mt-3 pt-3 mb-2">
                    <div class="d-flex align-items-center v-post-data">
                      <span class="v-author-image">
                        <img src="
                              <?= isset($pageData['name'])
                                ? requireAssets(filePath: "users/{$pageData['name']}.{$pageData['extension']}")
                                : requireAssets(filePath: "images/avatars/user-avatar.webp"); ?>
                              " alt="" class="img-fluid">
                      </span>
                      <span class="v-text align-middle d-flex align-items-center column-gap-1">
                        <?= implode(" ", splitString($currentBlog['author_name'], ' ', 1)) ?>
                        <span> &CenterDot; </span>
                        <?= formatDate(date: $currentBlog['created_at']) ?></span>
                    </div>
                  </div>
                </div>
                <div class="d-flex mt-3 align-items-center justify-content-between border-top border-bottom py-2">
                  <div class="v-action-container">
                    <button type="button" class="v-book-mark-blog">
                      <span class="v-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="384" height="384" viewBox="0 0 256 256">
                          <rect width="256" height="256" fill="none" />
                          <path fill="currentColor" d="M160.22 24V8a8 8 0 0 1 16 0v16a8 8 0 0 1-16 0m35.88 17a7.9 7.9 0 0 0 4.17 1.17a8 8 0 0 0 6.84-3.83l8-13.11a8 8 0 0 0-13.68-8.33l-8 13.1a8 8 0 0 0 2.67 11m47.51 12.59a8 8 0 0 0-10.08-5.16l-15.06 4.85a8 8 0 0 0 2.46 15.62a8.2 8.2 0 0 0 2.46-.39l15.05-4.85a8 8 0 0 0 5.17-10.11ZM217 97.58a80.22 80.22 0 0 1-10.22 94c-.34 1.73-.72 3.46-1.19 5.18A80.17 80.17 0 0 1 58.77 216L23.5 155a26 26 0 0 1 19.24-38.79l-3-5.2a26 26 0 0 1 19.2-38.78l-.7-1.23a26 26 0 0 1 37.23-34.47a26.06 26.06 0 0 1 44.83.47l12.26 21.2a26.07 26.07 0 0 1 43.25 2.8ZM109.07 55l25 43.17a26 26 0 0 1 17.33-10L126.42 45a10 10 0 1 0-17.35 10m-36.95 8l6.46 11.17a26.05 26.05 0 0 1 17.32-10L89.45 53a10 10 0 1 0-17.33 10m111.54 81l-20.22-35a10 10 0 0 0-17.74 9.25L158.3 140a8 8 0 0 1-13.87 8l-36.5-63a10 10 0 1 0-17.35 10l26.05 45a8 8 0 0 1-13.87 8L71 93a10 10 0 0 0-17.33 10l35.22 61A8 8 0 0 1 75 172l-20.28-35a10 10 0 0 0-17.34 10l35.27 61a64.12 64.12 0 0 0 117.42-15.44a63.52 63.52 0 0 0-6.41-48.56m19.41-38.42L181.93 69a10 10 0 0 0-17.38 10l33 57.05a80.2 80.2 0 0 1 9.45 25.46a64.23 64.23 0 0 0-3.93-55.93" />
                        </svg>
                      </span>
                    </button>
                    <span class="v-count">
                      <?= htmlspecialchars($currentBlog['no_of_likes']) ?>
                    </span>
                  </div>
                  <button type="button" class="v-book-mark-blog">
                    <span class="v-icon">
                      <svg xmlns="http://www.w3.org/2000/svg" width="384" height="384" viewBox="0 0 24 24">
                        <rect width="24" height="24" fill="none" />
                        <path fill="currentColor" d="M17 11v6.97l-5-2.14l-5 2.14V5h6V3H7c-1.1 0-2 .9-2 2v16l7-3l7 3V11zm4-4h-2v2h-2V7h-2V5h2V3h2v2h2z" />
                      </svg>
                    </span>
                  </button>
                </div>
                <div class="mt-5 d-flex flex-column row-gap-4">
                  <figure class="v-image d-flex ratio-16x9">
                    <img src="<?= requireAssets(filePath: "blogs/{$currentBlog['blog_image']}.{$currentBlog['blog_image_ext']}") ?>"
                      alt="" class="img-fluid flex-grow-1" />
                  </figure>
                  <div class="mt-2">
                    <?php $content = $currentBlog['blog_content'];
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </section>
</div>

<?php require_once "pageLayouts/dashboard.footer.view.php"; ?>