<?php

declare(strict_types=1);
?>

<div class="toast-container position-fixed top-0 end-0 p-3">
  <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <img src="<?= requireAssets(filePath: 'images/logos/favicon-32x32.png') ?>" class="rounded me-2" alt="...">
      <strong>Blogify</strong>
      <button type="button" class="btn-close ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">

    </div>
  </div>
</div>