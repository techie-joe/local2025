<?php

  $DIRECTORY = str_replace("/local2025", "", $_SERVER['REQUEST_URI']);
  $DIRECTORY = str_replace("/","\\",$DIRECTORY);

  define('DIRECTORY', __DIR__ . $DIRECTORY);
  $__SERVER = [ 'DIRECTORY' => DIRECTORY ];

  $directory = DIRECTORY;
  include "site/index.php";
  
  // echo "<pre>";
  // print_r($__SERVER);
  // print_r($_SERVER);
  // echo "</pre>";