<?php

declare(strict_types=1);
?>

<div class="s-header__search">
  <div class="s-header__search-inner">
    <div class="row">
      <form role="search" method="get" class="s-header__search-form" action="#">
        <label>
          <span class="u-screen-reader-text">Search for:</span>
          <input
            type="search"
            class="s-header__search-field"
            placeholder="Search for..."
            value=""
            name="s"
            title="Search for:"
            autocomplete="off" />
        </label>
        <input type="submit" class="s-header__search-submit" value="Search" />
      </form>

      <a href="#0" title="Close Search" class="s-header__search-close">Close</a>
    </div>
    <!-- end row -->
  </div>
  <!-- s-header__search-inner -->
</div>