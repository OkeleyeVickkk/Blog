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
                  <?php $currentBlog = $pageData['currentBlog'];
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
                        <img src="<?= isset($currentBlog['name']) ? requireAssets(filePath: "users/{$currentBlog['name']}.{$currentBlog['extension']}") : requireAssets(filePath: "images/avatars/user-avatar.webp"); ?>" alt="" class="img-fluid h-100 w-100 object-fit-cover">
                      </span>
                      <span class="v-text align-middle d-flex align-items-center column-gap-1">
                        <?= $currentBlog['userName'] ?>
                        <span> &CenterDot; </span>
                        <?= formatDate(date: $currentBlog['created_at']) ?>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="mt-5 d-flex flex-column row-gap-4">
                  <figure class="v-image d-flex ratio-16x9 overflow-hidden ratio" style="max-width: 768px;">
                    <img src="<?= requireAssets(filePath: "blogs/{$currentBlog['blog_image']}.{$currentBlog['blog_image_ext']}") ?>" alt="" class="img-fluid flex-grow-1 h-100 w-100 object-fit-cover" />
                  </figure>
                  <div class="mt-2">
                    <?php $content = $currentBlog['blog_content'];
                    echo html_entity_decode($content);
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