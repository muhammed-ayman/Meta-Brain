<?php

  namespace App\Core;

  class App {

    public static function view($page_name)
    {
      global $VIEWS_;
      if (file_exists($VIEWS_ . $page_name . '.php')) {
        include $VIEWS_ . $page_name . '.php';
      } else {
        header("HTTP/1.0 404 Not Found");
        include $VIEWS_ . '404.php';
      }
    }

    public static function get($pattern, $callback)
    {
      return self::map(['GET'], $pattern, $callback);
    }

    public static function post($pattern, $callback)
    {
      return self::map(['POST'], $pattern, $callback);
    }

    public static function delete($pattern, $callback)
    {
      return self::map(['DELETE'], $pattern, $callback);
    }

    public static function update($pattern, $callback)
    {
      return self::map(['UPDATE'], $pattern, $callback);
    }

    public static function map($methods, $pattern, $callback)
    {
      if (!in_array(strtoupper($_SERVER['REQUEST_METHOD']), $methods)) {
        return;
      }
      $pattern_regex = preg_replace("/\{(.*?)\}/", "(?P<$1>[\w-]+)", $pattern);
      $pattern_regex = "#^" . trim($pattern_regex, "/") . "$#";
      preg_match($pattern_regex, trim($_GET['route'], "/"), $matches);
      if ($matches && is_callable($callback)) {
        call_user_func($callback, (object) $matches);
        exit;
      }
    }

  }
