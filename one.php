<?php

spl_autoload_register(function($class_name) {
  include $class_name . '.php'; // catonate extension for file name 
});

// Instantiate
$two = new Two;
$three = new Three;

$two->sayHello();

?>