<?php

declare(strict_types=1);

define("FIRST_PARENT_DIR", __DIR__ . "/../");

if ($_SERVER['HTTP_HOST'] && $_SERVER['HTTP_HOST'] === "localhost") {
  define("ROOT_PATH", "http://localhost/project-blog/public/");
}

define("DB", [
  "name" => "blogify",
  "uname" => "root",
  "host" => "localhost:3306",
  "pass" => "horlarmhedey",
  "charset" => "utf8mb4"
]);

define("USER_SESSION", "user");
