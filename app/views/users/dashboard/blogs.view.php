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
                      <a href="<?= requireLink("dashboard/blog?id={$blog['id']}"); ?>">
                        <figure class="v-blog-image border d-flex  justify-content-center ratio-16x9 overflow-hidden">
                          <img src="<?= requireAssets("blogs/{$blog['blog_image']}.{$blog['blog_image_ext']}"); ?>" alt="" class="img-fluid flex-grow-1 object-fit-cover" />
                        </figure>
                      </a>
                      <div class="v-blog-content">
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="d-flex align-items-center v-post-data flex-grow-1">
                            <span class="v-author-image">
                              <img src="<?= requireAssets("users/{$pageData['name']}.{$pageData['extension']}"); ?>" alt="" class="img-fluid" />
                            </span>
                            <span class="fw-medium v-text align-middle d-flex align-items-center justify-content-between column-gap-1">
                              <span><?= implode(" ", splitString($blog['author_name'], ' ', 1)) ?></span>
                              <span class="d-none d-sm-inline"> &CenterDot; </span>
                              <span class="ms-auto"><?= formatDate(date: $blog['created_at']) ?></span>
                            </span>
                          </div>
                          <div class="d-none d-sm-flex align-items-center column-gap-2">
                            <button type="button" class="v-book-mark-blog">
                              <span class="v-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="384" height="384" viewBox="0 0 256 256">
                                  <rect width="256" height="256" fill="none" />
                                  <path fill="currentColor" d="M160.22 24V8a8 8 0 0 1 16 0v16a8 8 0 0 1-16 0m35.88 17a7.9 7.9 0 0 0 4.17 1.17a8 8 0 0 0 6.84-3.83l8-13.11a8 8 0 0 0-13.68-8.33l-8 13.1a8 8 0 0 0 2.67 11m47.51 12.59a8 8 0 0 0-10.08-5.16l-15.06 4.85a8 8 0 0 0 2.46 15.62a8.2 8.2 0 0 0 2.46-.39l15.05-4.85a8 8 0 0 0 5.17-10.11ZM217 97.58a80.22 80.22 0 0 1-10.22 94c-.34 1.73-.72 3.46-1.19 5.18A80.17 80.17 0 0 1 58.77 216L23.5 155a26 26 0 0 1 19.24-38.79l-3-5.2a26 26 0 0 1 19.2-38.78l-.7-1.23a26 26 0 0 1 37.23-34.47a26.06 26.06 0 0 1 44.83.47l12.26 21.2a26.07 26.07 0 0 1 43.25 2.8ZM109.07 55l25 43.17a26 26 0 0 1 17.33-10L126.42 45a10 10 0 1 0-17.35 10m-36.95 8l6.46 11.17a26.05 26.05 0 0 1 17.32-10L89.45 53a10 10 0 1 0-17.33 10m111.54 81l-20.22-35a10 10 0 0 0-17.74 9.25L158.3 140a8 8 0 0 1-13.87 8l-36.5-63a10 10 0 1 0-17.35 10l26.05 45a8 8 0 0 1-13.87 8L71 93a10 10 0 0 0-17.33 10l35.22 61A8 8 0 0 1 75 172l-20.28-35a10 10 0 0 0-17.34 10l35.27 61a64.12 64.12 0 0 0 117.42-15.44a63.52 63.52 0 0 0-6.41-48.56m19.41-38.42L181.93 69a10 10 0 0 0-17.38 10l33 57.05a80.2 80.2 0 0 1 9.45 25.46a64.23 64.23 0 0 0-3.93-55.93" />
                                </svg>
                              </span>
                            </button>
                            <span class="v-count"><?= $blog['no_of_likes'] ?></span>
                          </div>
                        </div>
                        <a href="<?= requireLink("dashboard/blog?id=" . $blog['id']); ?>">
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
                "No Blog"
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </main>
  </section>
</div>

<?php require_once "pageLayouts/dashboard.footer.view.php"; ?>