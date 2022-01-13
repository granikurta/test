<?php


namespace app\Models\Task;

use PDO;
use core\Connection\MysqlConnection;

class TaskManager extends MysqlConnection
{
    /**
     * @return Task[]
     */
    public function getTasks(): array
    {
        $sql = "SELECT * FROM tasks";
        $query = $this->pdo()->query($sql);
        $query->setFetchMode(PDO::FETCH_CLASS, Task::class);
        $tasks = $query->fetchAll();
        $query->closeCursor();

        return $tasks;
    }
}