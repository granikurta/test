<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


include_once("config/config.php");

use routes\Router;

$router = new Router();
$router->newRoute('/', 'IndexController@index');
$router->newRoute('/page/{page}', 'IndexController@index');
$router->newRoute('/task/{id}', 'TaskController@edit');
$router->newRoute('/task/{id}/update', 'TaskController@update');
$router->newRoute('/login', 'LoginController@index');
$router->newRoute('/auth', 'LoginController@login');

