<?php

declare(strict_types=1);
?>

<aside class="v-menu-sidebar">
  <ul class="v-menu-sidebar-inner">
    <li class="v-link-container">
      <ul class="v-main-links">
        <li class="v-main-link-container">
          <a href="<?= requireLink("dashboard/index") ?>" class="v-sidebar-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
              <rect width="24" height="24" fill="none" />
              <path fill="currentColor" d="M19 5v2h-4V5zM9 5v6H5V5zm10 8v6h-4v-6zM9 17v2H5v-2zM21 3h-8v6h8zM11 3H3v10h8zm10 8h-8v10h8zm-10 4H3v6h8z" />
            </svg>
            <span class="v-link-name"> Feeds </span>
          </a>
        </li>
        <li class="v-main-link-container">
          <a href="<?= requireLink("dashboard/write") ?>" class="v-sidebar-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
              <rect width="24" height="24" fill="none" />
              <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M12.5 22H18a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v9.5" />
                <path d="M14 2v4a2 2 0 0 0 2 2h4m-6.622 7.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
              </g>
            </svg>
            <span class="v-link-name"> Write </span>
          </a>
        </li>
        <li class="v-main-link-container">
          <button type="button" class="v-sidebar-link v-is-dropdown">
            <span class="v-_asod0u">
              <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 48 48">
                <rect width="48" height="48" fill="none" />
                <g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4">
                  <rect width="36" height="30" x="6" y="12" rx="2" />
                  <path stroke-linecap="round" d="M17.95 24.008h12M6 13l7-8h22l7 8" />
                </g>
              </svg>
              <span class="v-link-name"> Blogs </span>
            </span>
            <span class="v-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5l7 7l-7 7" />
              </svg>
            </span>
          </button>
          <div class="v-dropdown-container">
            <ul class="v-sublinks-container">
              <li class="v-sublink-item">
                <a href="<?= requireLink("dashboard/blogs") ?>" class="v-sublink">My Blogs</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="v-main-link-container">
          <a href="<?= requireLink("dashboard/profile") ?>" class="v-sidebar-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
              <rect width="24" height="24" fill="none" />
              <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
              </g>
            </svg>
            <span class="v-link-name"> Profile </span>
          </a>
        </li>
      </ul>
    </li>
    <div>
      <li class="v-link-container">
        <a href="<?= requireLink('dashboard/logout') ?>" class="v-sidebar-link logout">
          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
            <rect width="24" height="24" fill="none" />
            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
              <path stroke-dasharray="48" stroke-dashoffset="48" d="M16 5v-1c0 -0.55 -0.45 -1 -1 -1h-9c-0.55 0 -1 0.45 -1 1v16c0 0.55 0.45 1 1 1h9c0.55 0 1 -0.45 1 -1v-1">
                <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.6s" values="48;0" />
              </path>
              <path stroke-dasharray="12" stroke-dashoffset="12" d="M10 12h11">
                <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s" dur="0.2s" values="12;0" />
              </path>
              <path stroke-dasharray="6" stroke-dashoffset="6" d="M21 12l-3.5 -3.5M21 12l-3.5 3.5">
                <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.9s" dur="0.2s" values="6;0" />
              </path>
            </g>
          </svg>
          <span class="v-link-name">Log out</span>
        </a>
      </li>
    </div>
  </ul>
</aside>