<?php
session_start();
require '../vendor/autoload.php';
require '../src/routes.php';
require '../src/displayErrors.php';

$router->run( $router->routes );