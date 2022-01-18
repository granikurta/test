<?php

namespace app\Controllers;

use app\View;
use app\Models\Task\TaskManager;

class IndexController
{

    private array $columnSort = [
        'u.Name',
        'u.Email',
        't.Status'
    ];

    public function index($page = 1)
    {
        $taskManager = new TaskManager();
        $orderDirect = 'ASC';
        $orderColumn = 'u.Name';

        if (isset($_GET['column']) && in_array($_GET['column'], $this->columnSort)) {
        $orderColumn = $_GET['column'];
    }
        if (isset($_GET['order']) && ($_GET['order'] == 'ASC' || $_GET['order'] == 'DESC')) {
            $orderDirect = $_GET['order'];
        }

        $tasks = $taskManager->getTasksAndUser($page, $orderColumn, $orderDirect);

        $view = new View('TaskList', ['tasks' => $tasks, 'orderDirect' => $orderDirect, 'orderColumn' => $orderColumn]);
        $view->render();
    }
}