<?php require_once "dashboard.meta.view.php" ?>
<!-- header @::start -->
<div class="v-body-wrapper">
  <?php require_once "dashboard.header.view.php" ?>
  <!-- header @::end -->
  <!-- main @::start -->
  <section id="v-main">
    <!-- sidebar @::start -->
    <?php require_once "dashboard.sidebar.view.php" ?>
    <!-- sidebar @::end -->
    <main class="v-main-content">
      <div class="v-main-content-inner col-lg-11 col-xl-11 mx-auto">
        <div class="p-0">
          <header class="v-page-title">
            <h3 class="v-title">Write Page</h3>
            <span class="v-subtext">
              Good <span class="v-day ms-1" data-daytime="day">morning, be great today</span>
              <span class="d-flex align-items-center justify-content-center">
                <img src="" data-icon="day" alt="" class="img-fluid ms-1" />
              </span>
            </span>
          </header>
        </div>
        <div class="v-main-content-inner col-12 row mt-3 m-0 justify-content-between mx-auto position-relative">
          <div class="v-page-wrapper p-0"></div>
        </div>
      </div>
    </main>
  </section>
  <!-- main @::end -->
</div>
<?php require_once "dashboard.footer.view.php"; ?>