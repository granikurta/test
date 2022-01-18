<?php


namespace app\Models\Task;

use core\Library\Manager;
use core\Library\Paginate;
use core\Library\Paginator;
use Mapper\TaskMapper;
use PDO;
use core\Connection\MysqlConnection;

class TaskManager extends MysqlConnection implements Manager
{
    /**
     * @return TaskMapper
     */
    private TaskMapper $mapper;

    public function __construct()
    {
        $this->mapper = new TaskMapper();
        parent::__construct();
    }

    public function getTasks(): array
    {
        $stmt = $this->pdo()->prepare("SELECT * FROM Task");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param int $id
     * @return Task
     */
    public function getTask(int $id): Task
    {
        $stmt = $this->pdo()->prepare("SELECT * FROM Task WHERE Id = :id");
        $stmt->execute(['id' => $id]);
        $task = $stmt->fetch(PDO::FETCH_ASSOC);
        return $this->mapper->buildTaskEntity($task);
    }


    public function getTasksAndUser(int $page, string $sortColumn = 'User.Name', string $sortValue = 'ASC'): Paginator
    {
        $total = $this->getCountRow();
        $paginate = new Paginate($page, $total);
        $offset = $paginate->getOffset();
        $itemsPerPage = $paginate->getItemsPerPage();
        $sqlPaginate = " LIMIT $offset, $itemsPerPage";
        $sql = sprintf('SELECT t.Id, t.Title, t.Body, t.Status, t.Timestamp,  u.Id AS UserId, u.Name, u.Email FROM Task t INNER JOIN User u ON t.UserId = u.Id ORDER BY %s %s ', $sortColumn, $sortValue) . $sqlPaginate;
        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute();
        $taskAndUser = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $entity = $this->mapper->buildTaskAndUser($taskAndUser);
        return $paginate->buildPaginator($entity);
    }

    public function updateTask(int $id, array $data): void
    {
        $sql = "UPDATE Task SET Title = :title, Body = :body, Status = :status WHERE Id = :id";
        $this->pdo()->prepare($sql)->execute(['id' => $id, 'title' => $data['title'], 'body' => $data['body'], 'status' => $data['status']]);
    }

    public function getCountRow()
    {
        return $this->pdo()->query('SELECT count(*) FROM Task')->fetchColumn();
    }
}