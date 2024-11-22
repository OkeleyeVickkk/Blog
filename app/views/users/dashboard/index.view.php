<?php

declare(strict_types=1);

$customPageLink = [
  "<link rel='stylesheet' type='text/css' href='" . requireAssets('css/blogs.css', true) . "'></link>",
];
?>

<?php require_once "pageLayouts/dashboard.meta.view.php" ?>
<!-- header @::start -->
<div class="v-body-wrapper">
  <?php require_once "pageLayouts/dashboard.header.view.php" ?>
  <!-- header @::end -->
  <!-- main @::start -->
  <section id="v-main">
    <!-- sidebar @::start -->
    <?php require_once "pageLayouts/dashboard.sidebar.view.php" ?>
    <!-- sidebar @::end -->
    <main class="v-main-content">
      <div class="v-main-content-inner col-lg-11 col-xl-11 mx-auto">
        <div class="p-0">
          <?php require_once "pageLayouts/dashboard.pageTitle.view.php" ?>
        </div>
        <div class="v-main-content-inner col-12 row mt-3 m-0 justify-content-between mx-auto position-relative">
          <div class="v-page-wrapper p-0 pb-5 position-relative">
            <div class="v-blog-container">
              <ul class="v-blogs-grid-container">
                <?php
                $allBlogs = $pageData['allBlogs'];
                if (count($allBlogs) > 0) {
                  foreach ($allBlogs as $blog) {

                    // preIt($blog);
                ?>
                    <li class="v-each-blog-post">
                      <a href="<?= requireLink("dashboard/blog?id=" . $blog['blogId']); ?>">
                        <figure class="v-blog-image">
                          <img src="<?= requireAssets('blogs/' . $blog['blog_image'] . '.' . $blog['blog_image_ext']); ?>" alt="" class="img-fluid" />
                        </figure>
                      </a>
                      <div class="v-blog-content">
                        <a href="<?= requireLink("dashboard/blog?id=" . $blog['blogId']); ?>">
                          <div class="d-flex align-items-start column-gap-4 justify-content-between">
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
                          <?php if (!empty($blog['blog_subtitle'])) { ?>
                            <span class="v-subtext">
                              <?= $blog['blog_subtitle'] ?>
                            </span>
                          <?php } ?>
                        </a>
                        <div class="d-flex align-items-center justify-content-between mt-auto">
                          <div class="d-flex align-items-center v-post-data">
                            <span class="v-author-image">
                              <img src="<?= requireAssets('users/' . $blog['name'] . '.' . $blog['extension']); ?>" alt="" class="img-fluid" />
                            </span>
                            <span class="fw-semibold v-text align-middle d-flex align-items-center column-gap-1">
                              <?= $blog['userName']; ?>
                              <span> &CenterDot; </span>
                              <?= formatDate($blog['created_at']) ?>
                            </span>
                          </div>
                          <button type="button" data-action="bookmark" data-id="<?= $blog['blogId'] ?>" class="v-book-mark-blog">
                            <span class="v-icon">
                              <svg xmlns="http://www.w3.org/2000/svg" width="384" height="384" viewBox="0 0 24 24">
                                <rect width="24" height="24" fill="none" />
                                <path fill="currentColor" d="M5 21V5q0-.825.588-1.412T7 3h6v2H7v12.95l5-2.15l5 2.15V11h2v10l-7-3zM7 5h6zm10 4V7h-2V5h2V3h2v2h2v2h-2v2z" />
                              </svg>
                            </span>
                          </button>
                        </div>
                      </div>
                    </li>
                <?php }
                } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </main>
  </section>
  <!-- main @::end -->
</div>
<?php require_once "pageLayouts/dashboard.footer.view.php"; ?>