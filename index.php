<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


include_once("config/config.php");

use routes\Router;

$router = new Router();

$router->newRoute('/', 'IndexController@index');

