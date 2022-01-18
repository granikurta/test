<?php

namespace core\Connection;

use PDO;

abstract class Connection
{
    protected $user = DB_USER;
    protected $pass = DB_PASS;

    abstract public function pdo(): Pdo;
}