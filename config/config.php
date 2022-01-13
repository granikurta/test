<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]);
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'mysql');
define('DB_PASS', 'mysql');
define('DB_NAME', 'toDo');

const APP_PATH = ROOT . '/app';
const CONTROLLER_PATH = APP_PATH . "/Controllers/";
const MODEL_PATH = APP_PATH . "/Models/";
const LAYOUT_PATH = ROOT . "/layout/";

const CONTROLLER_PATH_NAMESPACE = 'app\\Controllers\\';

require_once ROOT . "/__autoload.php";
