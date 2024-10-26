<?php

declare(strict_types=1);

$customPageLink =
  "<link rel='stylesheet' type='text/css' href='" . requireAssets('css/blogs.css', true) . "'></link>";
require_once "pageLayouts/dashboard.meta.view.php" ?>
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
        <div class="v-main-content-inner col-12 row mt-3 m-0 justify-content-between mx-auto position-relative">
          <div class="v-page-wrapper p-0 pb-5 position-relative">
            <div class="v-blog-container">
              <ul class="v-blogs-grid-container">
                <li class="v-each-blog-post">
                  <a href="">
                    <figure class="v-image">
                      <img src="<?= requireAssets('images/thumbs/about/about-600.jpg'); ?>" alt="" class="img-fluid" />
                    </figure>
                  </a>
                  <div class="v-blog-content">
                    <a href="">
                      <div class="d-flex align-items-start column-gap-4 justify-content-between">
                        <h5 class="v-title">Improve your Design Skills</h5>
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
                      <span class="v-subtext">
                        The industry is constantly evolving , but good design is timeless. Learn how to quickly develop an "eye" for UI design and
                        improve your design skills in...
                      </span>
                    </a>
                    <div class="d-flex align-items-center justify-content-between mt-auto">
                      <div class="d-flex align-items-center v-post-data">
                        <span class="v-author-image">
                          <img src="<?= requireAssets('images/avatars/user-avatar.png'); ?>" alt="" class="img-fluid" />
                        </span>
                        <span class="fw-semibold v-text align-middle d-flex align-items-center column-gap-1">
                          Lana Steiner
                          <span> &CenterDot; </span>
                          12 Jan,2025</span>
                      </div>
                      <button type="button" class="v-book-mark-blog">
                        <span class="v-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="384" height="384" viewBox="0 0 24 24">
                            <rect width="24" height="24" fill="none" />
                            <path fill="currentColor" d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3l7 3V5c0-1.1-.9-2-2-2m0 15l-5-2.18L7 18V5h10z" />
                          </svg>
                        </span>
                      </button>
                    </div>
                  </div>
                </li>
                <li class="v-each-blog-post">
                  <a href="">
                    <figure class="v-image">
                      <img src="<?= requireAssets('images/thumbs/about/about-600.jpg'); ?>" alt="" class="img-fluid" />
                    </figure>
                  </a>
                  <div class="v-blog-content">
                    <a href="">
                      <div class="d-flex align-items-start column-gap-4 justify-content-between">
                        <h5 class="v-title">Improve your Design Skills: Develop an "Eye" for Design</h5>
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
                      <span class="v-subtext">
                        The industry is constantly evolving , but good design is timeless. Learn how to quickly develop an "eye" for UI design and
                        improve your design skills in...
                      </span>
                    </a>
                    <div class="d-flex align-items-center justify-content-between mt-auto">
                      <div class="d-flex align-items-center v-post-data">
                        <span class="v-author-image">
                          <img src="<?= requireAssets('images/avatars/user-avatar.png'); ?>" alt="" class="img-fluid" />
                        </span>
                        <span class="fw-semibold v-text align-middle d-flex align-items-center column-gap-1">
                          Lana Steiner
                          <span> &CenterDot; </span>
                          12 Jan,2025</span>
                      </div>
                      <button type="button" class="v-book-mark-blog">
                        <span class="v-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="384" height="384" viewBox="0 0 24 24">
                            <rect width="24" height="24" fill="none" />
                            <path fill="currentColor" d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3l7 3V5c0-1.1-.9-2-2-2m0 15l-5-2.18L7 18V5h10z" />
                          </svg>
                        </span>
                      </button>
                    </div>
                  </div>
                </li>
                <li class="v-each-blog-post">
                  <a href="">
                    <figure class="v-image">
                      <img src="<?= requireAssets('images/thumbs/about/about-600.jpg'); ?>" alt="" class="img-fluid" />
                    </figure>
                  </a>
                  <div class="v-blog-content">
                    <a href="">
                      <div class="d-flex align-items-start column-gap-4 justify-content-between">
                        <h5 class="v-title">Improve your Design Skills: Develop an "Eye" for Design</h5>
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
                      <span class="v-subtext">
                        The industry is constantly evolving , but good design is timeless. Learn how to quickly develop an "eye" for UI design and
                        improve your design skills in...
                      </span>
                    </a>
                    <div class="d-flex align-items-center justify-content-between mt-auto">
                      <div class="d-flex align-items-center v-post-data">
                        <span class="v-author-image">
                          <img src="<?= requireAssets('images/avatars/user-avatar.png'); ?>" alt="" class="img-fluid" />
                        </span>
                        <span class="fw-semibold v-text align-middle d-flex align-items-center column-gap-1">
                          Lana Steiner
                          <span> &CenterDot; </span>
                          12 Jan,2025</span>
                      </div>
                      <button type="button" class="v-book-mark-blog">
                        <span class="v-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="384" height="384" viewBox="0 0 24 24">
                            <rect width="24" height="24" fill="none" />
                            <path fill="currentColor" d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3l7 3V5c0-1.1-.9-2-2-2m0 15l-5-2.18L7 18V5h10z" />
                          </svg>
                        </span>
                      </button>
                    </div>
                  </div>
                </li>
                <li class="v-each-blog-post">
                  <a href="">
                    <figure class="v-image">
                      <img src="<?= requireAssets('images/thumbs/about/about-600.jpg'); ?>" alt="" class="img-fluid" />
                    </figure>
                  </a>
                  <div class="v-blog-content">
                    <a href="">
                      <div class="d-flex align-items-start column-gap-4 justify-content-between">
                        <h5 class="v-title">Improve your Design Skills: Develop an "Eye" for Design</h5>
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
                      <span class="v-subtext">
                        The industry is constantly evolving , but good design is timeless. Learn how to quickly develop an "eye" for UI design and
                        improve your design skills in...
                      </span>
                    </a>
                    <div class="d-flex align-items-center justify-content-between mt-auto">
                      <div class="d-flex align-items-center v-post-data">
                        <span class="v-author-image">
                          <img src="<?= requireAssets('images/avatars/user-avatar.png'); ?>" alt="" class="img-fluid" />
                        </span>
                        <span class="fw-semibold v-text align-middle d-flex align-items-center column-gap-1">
                          Lana Steiner
                          <span> &CenterDot; </span>
                          12 Jan,2025</span>
                      </div>
                      <button type="button" class="v-book-mark-blog">
                        <span class="v-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="384" height="384" viewBox="0 0 24 24">
                            <rect width="24" height="24" fill="none" />
                            <path fill="currentColor" d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3l7 3V5c0-1.1-.9-2-2-2m0 15l-5-2.18L7 18V5h10z" />
                          </svg>
                        </span>
                      </button>
                    </div>
                  </div>
                </li>
                <li class="v-each-blog-post">
                  <a href="">
                    <figure class="v-image">
                      <img src="<?= requireAssets('images/thumbs/about/about-600.jpg'); ?>" alt="" class="img-fluid" />
                    </figure>
                  </a>
                  <div class="v-blog-content">
                    <a href="">
                      <div class="d-flex align-items-start column-gap-4 justify-content-between">
                        <h5 class="v-title">Improve your Design Skills: Develop an "Eye" for Design</h5>
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
                      <span class="v-subtext">
                        The industry is constantly evolving , but good design is timeless. Learn how to quickly develop an "eye" for UI design and
                        improve your design skills in...
                      </span>
                    </a>
                    <div class="d-flex align-items-center justify-content-between mt-auto">
                      <div class="d-flex align-items-center v-post-data">
                        <span class="v-author-image">
                          <img src="<?= requireAssets('images/avatars/user-avatar.png'); ?>" alt="" class="img-fluid" />
                        </span>
                        <span class="fw-semibold v-text align-middle d-flex align-items-center column-gap-1">
                          Lana Steiner
                          <span> &CenterDot; </span>
                          12 Jan,2025</span>
                      </div>
                      <button type="button" class="v-book-mark-blog">
                        <span class="v-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="384" height="384" viewBox="0 0 24 24">
                            <rect width="24" height="24" fill="none" />
                            <path fill="currentColor" d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3l7 3V5c0-1.1-.9-2-2-2m0 15l-5-2.18L7 18V5h10z" />
                          </svg>
                        </span>
                      </button>
                    </div>
                  </div>
                </li>
                <li class="v-each-blog-post">
                  <a href="">
                    <figure class="v-image">
                      <img src="<?= requireAssets('images/thumbs/about/about-600.jpg'); ?>" alt="" class="img-fluid" />
                    </figure>
                  </a>
                  <div class="v-blog-content">
                    <a href="">
                      <div class="d-flex align-items-start column-gap-4 justify-content-between">
                        <h5 class="v-title">Improve your Design Skills: Develop an "Eye" for Design</h5>
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
                      <span class="v-subtext">
                        The industry is constantly evolving , but good design is timeless. Learn how to quickly develop an "eye" for UI design and
                        improve your design skills in...
                      </span>
                    </a>
                    <div class="d-flex align-items-center justify-content-between mt-auto">
                      <div class="d-flex align-items-center v-post-data">
                        <span class="v-author-image">
                          <img src="<?= requireAssets('images/avatars/user-avatar.png'); ?>" alt="" class="img-fluid" />
                        </span>
                        <span class="fw-semibold v-text align-middle d-flex align-items-center column-gap-1">
                          Lana Steiner
                          <span> &CenterDot; </span>
                          12 Jan,2025</span>
                      </div>
                      <button type="button" class="v-book-mark-blog">
                        <span class="v-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="384" height="384" viewBox="0 0 24 24">
                            <rect width="24" height="24" fill="none" />
                            <path fill="currentColor" d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3l7 3V5c0-1.1-.9-2-2-2m0 15l-5-2.18L7 18V5h10z" />
                          </svg>
                        </span>
                      </button>
                    </div>
                  </div>
                </li>
                <li class="v-each-blog-post">
                  <a href="">
                    <figure class="v-image">
                      <img src="<?= requireAssets('images/thumbs/about/about-600.jpg'); ?>" alt="" class="img-fluid" />
                    </figure>
                  </a>
                  <div class="v-blog-content">
                    <a href="">
                      <div class="d-flex align-items-start column-gap-4 justify-content-between">
                        <h5 class="v-title">Improve your Design Skills: Develop an "Eye" for Design</h5>
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
                      <span class="v-subtext">
                        The industry is constantly evolving , but good design is timeless. Learn how to quickly develop an "eye" for UI design and
                        improve your design skills in...
                      </span>
                    </a>
                    <div class="d-flex align-items-center justify-content-between mt-auto">
                      <div class="d-flex align-items-center v-post-data">
                        <span class="v-author-image">
                          <img src="<?= requireAssets('images/avatars/user-avatar.png'); ?>" alt="" class="img-fluid" />
                        </span>
                        <span class="fw-semibold v-text align-middle d-flex align-items-center column-gap-1">
                          Lana Steiner
                          <span> &CenterDot; </span>
                          12 Jan,2025</span>
                      </div>
                      <button type="button" class="v-book-mark-blog">
                        <span class="v-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="384" height="384" viewBox="0 0 24 24">
                            <rect width="24" height="24" fill="none" />
                            <path fill="currentColor" d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3l7 3V5c0-1.1-.9-2-2-2m0 15l-5-2.18L7 18V5h10z" />
                          </svg>
                        </span>
                      </button>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </main>
  </section>
</div>

<?php require_once "pageLayouts/dashboard.footer.view.php"; ?>