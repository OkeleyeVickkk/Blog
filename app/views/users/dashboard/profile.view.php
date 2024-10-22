<?php

declare(strict_types=1);

$customPageLink =
  "<link rel='stylesheet' type='text/css' href='" . requireAssets('css/profile.css', true) . "'></link>";
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
    <main class="v-main-content">
      <div class="v-main-content-inner col-lg-9 col-xl-6 p-4 mx-auto rounded-4 bg-white">
        <div class="p-0">
          <header class="v-page-title">
            <h3 class="v-title">My Account</h3>
            <span class="v-subtext">
              Good <span class="v-day ms-1" data-daytime="day">morning, be great today</span>
              <span class="d-flex align-items-center justify-content-center" data-icon="day">
              </span>
            </span>
          </header>
        </div>
        <div class="v-main-content-inner col-12 row mt-3 m-0 justify-content-between mx-auto position-relative">
          <div class="v-page-wrapper p-0 mb-5">
            <div class="d-flex flex-column row-gap-4">
              <section class="v-middle v-cornered-items-container">
                <!-- v-each item @::start -->
                <div class="v-each-cornered-item">
                  <div class="v-title">
                    <span class="v-item">Username</span>
                    <span class="v-item">Edit username</span>
                  </div>
                  <div class="v-value">
                    <span class="v-item">Okeleye Victor Olamide</span>
                    <button type="button" class="v-edit-user">
                      Edit
                    </button>
                  </div>
                </div>
                <!-- v-each item @::end -->
              </section>
              <section class="v-bottom v-cornered-items-container">
                <!-- v-each-button @::start -->
                <button type="button" class="v-each-cornered-item" data-bs-toggle="offcanvas" data-bs-target="#accountSettings">
                  <span class="v-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                      <rect width="24" height="24" fill="none" />
                      <mask id="lineMdCogFilled0">
                        <defs>
                          <symbol id="lineMdCogFilled1">
                            <path
                              d="M11 13L15.74 5.5C16.03 5.67 16.31 5.85 16.57 6.05C16.57 6.05 16.57 6.05 16.57 6.05C16.64 6.1 16.71 6.16 16.77 6.22C18.14 7.34 19.09 8.94 19.4 10.75C19.41 10.84 19.42 10.92 19.43 11C19.43 11 19.43 11 19.43 11C19.48 11.33 19.5 11.66 19.5 12z">
                              <animate
                                fill="freeze"
                                attributeName="d"
                                begin="0.5s"
                                dur="0.2s"
                                values="M11 13L15.74 5.5C16.03 5.67 16.31 5.85 16.57 6.05C16.57 6.05 16.57 6.05 16.57 6.05C16.64 6.1 16.71 6.16 16.77 6.22C18.14 7.34 19.09 8.94 19.4 10.75C19.41 10.84 19.42 10.92 19.43 11C19.43 11 19.43 11 19.43 11C19.48 11.33 19.5 11.66 19.5 12z;M11 13L15.74 5.5C16.03 5.67 16.31 5.85 16.57 6.05C16.57 6.05 19.09 5.04 19.09 5.04C19.25 4.98 19.52 5.01 19.6 5.17C19.6 5.17 21.67 8.75 21.67 8.75C21.77 8.92 21.73 9.2 21.6 9.32C21.6 9.32 19.43 11 19.43 11C19.48 11.33 19.5 11.66 19.5 12z" />
                            </path>
                          </symbol>
                        </defs>
                        <g fill="none" stroke="#fff" stroke-width="2">
                          <path
                            stroke-dasharray="40"
                            stroke-dashoffset="40"
                            stroke-width="5"
                            d="M12 7c2.76 0 5 2.24 5 5c0 2.76 -2.24 5 -5 5c-2.76 0 -5 -2.24 -5 -5c0 -2.76 2.24 -5 5 -5Z">
                            <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.5s" values="40;0" />
                            <set fill="freeze" attributeName="opacity" begin="0.5s" to="0" />
                          </path>
                          <g fill="#fff" stroke="none" opacity="0">
                            <use href="#lineMdCogFilled1" />
                            <use href="#lineMdCogFilled1" transform="rotate(60 12 12)" />
                            <use href="#lineMdCogFilled1" transform="rotate(120 12 12)" />
                            <use href="#lineMdCogFilled1" transform="rotate(180 12 12)" />
                            <use href="#lineMdCogFilled1" transform="rotate(240 12 12)" />
                            <use href="#lineMdCogFilled1" transform="rotate(300 12 12)" />
                            <set fill="freeze" attributeName="opacity" begin="0.5s" to="1" />
                          </g>
                        </g>
                        <circle cx="12" cy="12" r="3.5" />
                      </mask>
                      <rect width="24" height="24" fill="currentColor" mask="url(#lineMdCogFilled0)" />
                    </svg>
                  </span>
                  <span class="v-text" role="text">Settings</span>
                </button>
                <!-- v-each-button @::end -->
                <!-- v-each-button @::start -->
                <button type="button" class="v-each-cornered-item" data-bs-toggle="offcanvas" data-bs-target="#blogAndContacts">
                  <span class="v-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="384" height="384" viewBox="0 0 24 24">
                      <rect width="24" height="24" fill="none" />
                      <path fill="currentColor" d="M19.97 6.321v13.33a2.47 2.47 0 0 1-1.45 2.13a2.53 2.53 0 0 1-1.3.2a2.46 2.46 0 0 1-1.22-.51l-3.41-2.53a1.07 1.07 0 0 0-1.23 0l-3.43 2.56a2.47 2.47 0 0 1-1.2.5h-.3a2.4 2.4 0 0 1-1-.22a2.5 2.5 0 0 1-1-.83a2.53 2.53 0 0 1-.43-1.25V6.342a4.49 4.49 0 0 1 4.65-4.34h6.73A4.49 4.49 0 0 1 20 6.321z" />
                    </svg>
                  </span>
                  <span class="v-text" role="text">Saved Blogs</span>
                </button>
                <!-- v-each-button @::end -->
                <!-- v-each-button @::start -->
                <button type="button" class="v-each-cornered-item v-red">
                  <span class="v-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                      <rect width="24" height="24" fill="none" />
                      <path
                        fill="currentColor"
                        fill-rule="evenodd"
                        d="M1.625 12c0 .414.336.75.75.75h10.973l-1.961 1.68a.75.75 0 1 0 .976 1.14l3.5-3a.75.75 0 0 0 0-1.14l-3.5-3a.75.75 0 1 0-.976 1.14l1.96 1.68H2.376a.75.75 0 0 0-.75.75"
                        clip-rule="evenodd" />
                      <path
                        fill="currentColor"
                        d="M9.375 9.75h.378a2.25 2.25 0 0 1 3.586-2.458l3.5 3a2.25 2.25 0 0 1 0 3.416l-3.5 3a2.25 2.25 0 0 1-3.586-2.458h-.378V16c0 2.828 0 4.243.879 5.121c.878.879 2.293.879 5.121.879h1c2.828 0 4.243 0 5.121-.879c.879-.878.879-2.293.879-5.121V8c0-2.828 0-4.243-.879-5.121C20.618 2 19.203 2 16.375 2h-1c-2.828 0-4.243 0-5.121.879c-.879.878-.879 2.293-.879 5.121z" />
                    </svg>
                  </span>
                  <span class="v-text" role="text">Logout Account</span>
                </button>
                <!-- v-each-button @::end -->
                <!-- v-each-button @::start -->
                <button type="button" class="v-each-cornered-item v-red">
                  <span class="v-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="384" height="384" viewBox="-3 -2 24 24">
                      <rect x=-3 y=-2 width="24" height="24" fill="none" />
                      <path fill="currentColor" d="M12 2h5a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h5V1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1zm3.8 6l-.613 9.2a3 3 0 0 1-2.993 2.8H5.826a3 3 0 0 1-2.993-2.796L2.205 8zM7 9a1 1 0 0 0-1 1v7a1 1 0 0 0 2 0v-7a1 1 0 0 0-1-1m4 0a1 1 0 0 0-1 1v7a1 1 0 0 0 2 0v-7a1 1 0 0 0-1-1" />
                    </svg>
                  </span>
                  <span class="v-text" role="text">Delete Account</span>
                </button>
                <!-- v-each-button @::end -->
              </section>
            </div>
          </div>
        </div>
      </div>
    </main>
  </section>

  <?php require_once "pageComponents/profilePage.comp.php" ?>
</div>

<?php require_once "pageLayouts/dashboard.footer.view.php"; ?>