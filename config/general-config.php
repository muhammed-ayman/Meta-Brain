<?php

  namespace Config;

  // DATABASE CONFIGs
  $HOST = 'localhost';
  $USERNAME = 'root';
  $PASSWORD = '';
  $DB_NAME = 'meta-brain';

  // DIRECTORIES CONFIGs
  define('DS', DIRECTORY_SEPARATOR);
  define('ROOT', dirname(__DIR__) . DS);

    // ROOT DIRs
  $API_ = ROOT . 'apis' . DS;
  $APP_ = ROOT . 'app' . DS;
  $CONFIG_ = ROOT . 'config' . DS;
  $PUBLIC_ = ROOT . 'public' . DS;

    // APP SUB-DIRs
  $CONTROLLERS_ = $APP_ . 'controllers' . DS;
  $CORE_ = $APP_ . 'core' . DS;
  $MODELS_ = $APP_ . 'models' . DS;
  $VIEWS_ = $APP_ . 'views' . DS;
  $ROUTES_ = $APP_ . 'routes' . DS;

    // PUBLIC SUB-DIRs
  $CSS_ = $PUBLIC_ . 'css' . DS;
  $FONTS_ = $PUBLIC_ . 'fonts' . DS;
  $JS_ = $PUBLIC_ . 'js' . DS;
  $IMGS_ = $PUBLIC_ . 'imgs' . DS;

  // CLASSES AUTOLOADER
  spl_autoload_register(function($class) {

    $class_path = explode('\\', $class);
    $class_name = ucwords(end($class_path)) . '.php';
    $class_path = ROOT . strtolower(implode(DS, array_slice($class_path, 0, -1))) . DS . $class_name;
    if (file_exists($class_path)) {
      require_once($class_path);
    } else{
      echo $class_path;
      echo 'error';
      exit;
    }

  });


  // DB CONNECTION
  $db = new \Config\Database();
  $conn = $db->connect();

  // APIS ROUTES
  require $ROUTES_ . 'apis.php';

  // WEB ROUTES
  require $ROUTES_ . 'web.php';
