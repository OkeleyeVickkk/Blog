<?php

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params(
  lifetime_or_options: 1800,
  path: "/",
  httponly: true,
  secure: true,
  domain: "/" // example of a domain can be www.google.com
);

session_start();

// function
$regenerateSessionId = function () {
  session_regenerate_id(true);
  $_SESSION['last_generation'] = time();
};
!isset($_SESSION['last_generation'])
  ? $regenerateSessionId()
  : (function () use ($regenerateSessionId) {
    $timeInterval = 60 * 30; // in minutes = 30 mins
    if ((time() - $_SESSION['last_generation']) >= $timeInterval) {
      $regenerateSessionId();
    }
  })();
