<?php

declare(strict_types=1);

?>

<header class="v-page-title">
  <h3 class="v-title"><?= isset($pageData['pageTitle']) ? $pageData['pageTitle'] : "Index"; ?></h3>
  <span class="v-subtext mt-1">
    Good
    <span class="v-day ms-1">
      day <?= splitString($pageData['userName'], ' ', 0)[0] ?><?= isset($subtitle) ? $subtitle : '' ?>
    </span>
    <span class="d-flex align-items-center justify-content-center">
      <span class="v-icon" data-icon="day"></span>
    </span>
  </span>
</header>