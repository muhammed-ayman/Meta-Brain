<?php

  session_start();

  if (!isset($_GET['route'])) {
    header("Location: /home");
  }

  // General Configurations
  require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'general-config.php';   