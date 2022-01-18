<?php

namespace core\Connection;

use PDO;
use PDOEXCEPTION;

class MysqlConnection extends Connection
{
    private PDO $pdo;
    private $sth;

    public function __construct()
    {
        try {
            $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOEXCEPTION $err) {
            echo "Failed To Connect. Error " . $err->getMessage();
        }
    }

    public function pdo(): PDO
    {
        return $this->pdo;
    }
}