<?php
require_once __DIR__.'/vendor/autoload.php';
spl_autoload_register(function ($class) {
  var_dump($class);
  if(preg_match('/Test$/', $class)) {
    require_once __DIR__.'/tests/integration/'.$class.'.php';
  }
});
?>