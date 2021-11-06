<?php

// function __autoload($class)
// {
//    $class = strtolower($class);
//    $the_path = "includes/{$class}.php";

//    if (file_exists($the_pat1h)) {
//       require_once($the_path);
//    } else {
//       die("The file name {$class}.php was not found...");
//    }
// }

function classAutoLoader($class)
{
   $class = strtolower($class);
   $class_file = "includes/{$class}.php";

   if (is_file($class_file) && !class_exists($class)) {
      include $class_file;
   }
}

spl_autoload_register('classAutoLoader');

function redirect($location)
{
   header("Location: {$location}");
}
