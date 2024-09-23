<?php

class Session
{
  const SESSION_STARTED = TRUE;
  const SESSION_NOT_STARTED = FALSE;

  private $sessionState = self::SESSION_NOT_STARTED;
  private static $instance;

  private function __construct() {}

  public static function getInstance(): Session
  {
    if (!isset(self::$instance)) {
      self::$instance = new self;
    }
    self::$instance->startSession();
    return self::$instance;
  }

  public function startSession(): bool
  {
    if ($this->sessionState == self::SESSION_NOT_STARTED) {
      $this->sessionState = session_start();
    }
    return $this->sessionState;
  }

  public function __set(string $name, mixed $value): void
  {
    if (!$name || !$value) {
      die("Error: No session name or data value is set");
    }
    $_SESSION[$name] = $value;
  }

  public function __get(string $name): mixed
  {
    if (isset($_SESSION[$name])) {
      return $_SESSION[$name];
    }
  }

  public function __isset(string $name): bool
  {
    return isset($_SESSION[$name]);
  }

  public function __unset(string $name): void
  {
    unset($_SESSION[$name]);
  }

  public function destroy(): bool
  {
    if ($this->sessionState == self::SESSION_STARTED) {
      $this->sessionState = !session_destroy();
      unset($_SESSION);
      return !$this->sessionState;
    }
    return FALSE;
  }
}
