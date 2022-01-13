<?php

namespace core\Connection;

use PDO;
use PDOEXCEPTION;

abstract class Connection
{
    protected $user = DB_USER;
    protected $pass = DB_PASS;

    abstract public function pdo(): Pdo;
}