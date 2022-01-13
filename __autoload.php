<?php
spl_autoload_register(function ($className) {
    $file = dirname(__FILE__) . '/' . str_replace('\\', "\/", $className) . '.php';
    if (file_exists($file)) {
        include_once $file;
    } else {
        die("The file {$className}.php could not be found!");
    }
});
