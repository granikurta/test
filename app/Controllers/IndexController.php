<?php

namespace app\Controllers;

use app\View;
use app\Models\Task\TaskManager;

class IndexController
{
    public function index()
    {
        $taskManager = new TaskManager();
        $tasks = $taskManager->getTasks();
        $view = new View('TaskList', ['test' => 'xuy']);
        $view->render();
    }
}