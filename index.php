<?php
$uri = $_SERVER['REQUEST_URI'];
include('autoload.php');
$router  = new router($uri);
$uriArray = $router->partUrl();
$loadfile = new loadfile;
include('header.php');
$loadfile ->load($uriArray[2]);
include('footer.php');