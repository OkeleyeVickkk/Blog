<?php

declare(strict_types=1);

$customPageLink = [
  "<link rel='stylesheet' type='text/css' href='" . requireAssets('css/blogs.css', true) . "'></link>",
  "<link rel='stylesheet' type='text/css' href='" . requireAssets('css/rte_theme_default.css') . "'></link>",
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
          <?php
          $subtitle = ', writing has never been better';
          require_once "pageLayouts/dashboard.pageTitle.view.php"
          ?>
        </div>
        <div class="v-main-content-inner col-12 row mt-3 m-0 justify-content-between mx-auto position-relative">
          <div class="v-page-wrapper p-0">
            <form action="" class="v-text-editor-container mt-4">
              <div class="col-12 col-lg-8 d-flex flex-column mb-3">
                <div class="v-form-input">
                  <textarea class="v-main-title v-text-editor-control" placeholder="Title" maxlength="100" rows="2" autofocus autocapitalize="sentences" name="blogTitle" spellcheck="false"></textarea>
                </div>
                <div class="v-form-input">
                  <textarea type="text" spellcheck="false" class="v-subtext v-text-editor-control" placeholder="Add a subtitle..." maxlength="150" name="blogSubtitle"></textarea>
                </div>
                <div class="v-form-input d-flex flex-column row-gap-2 my-2">
                  <label class="opacity-75" for="bannerImage">Add a banner</label>
                  <input type="file" name="bannerImage" class="v-form-control" id="bannerImage">
                </div>
              </div>
              <input type="hidden" name="authorId" class="v-author-id" value="<?= $pageData['userId'] ?>" hidden>
              <input type="hidden" name="authorName" class="v-author-name" value="<?= $pageData['fullName'] ?>" hidden>
              <div role="presentation" id="v-editor"></div>
              <div class="mt-4 mb-5 col-12 col-sm-12 col-lg-7 col-xl-6 mx-auto">
                <button type="button" class="v-action v-publish-blog-toggler">Publish</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
  </section>
  <!-- main @::end -->
</div>
<?php $customScript = [
  '<script src="' . requireAssets("js/rte.js") . '"></script>',
  '<script src="' . requireAssets("js/all_plugins.js") . '"></script>',
  '<script type="module" src="' . requireAssets("js/editor.custom.js", true) . '"></script>',
] ?>
<?php require_once "pageLayouts/dashboard.footer.view.php"; ?>