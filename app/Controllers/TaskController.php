<?php


namespace app\Controllers;


use app\Models\Task\TaskManager;
use app\View;

class TaskController
{
    public function edit($id)
    {
        $condition = [];
        if (isset($_GET['error'])) {
            $condition = $_GET['error'];
        }

        $taskManager = new TaskManager();
        $task = $taskManager->getTask($id);

        $view = new View('TaskEdit', ['task' => $task, 'error' => $condition]);
        $view->render();
    }

    public function update($id)
    {
        $condition = [
            'error' => [],
            'status' => []
        ];
        $updateAr = [];
        $taskManager = new TaskManager();

        if (isset($_POST['title']) && !empty($_POST['title'])) {
            $updateAr['title'] = $_POST['title'];
        } else {
            $condition['error']['title'] = "Title input not valid ";
        }
        if (isset($_POST['body']) && !empty($_POST['body'])) {
            $updateAr['body'] = $_POST['body'];
        } else {
            $condition['error']['body'] = "Body input not valid ";
        }
        if (isset($_POST['status'])) {
            $updateAr['status'] = 1;
        } else {
            $updateAr['status'] = 0;
        }

        if (empty($errors)) {
            $taskManager->updateTask($id, $updateAr);
            $condition['status'][] = 'updated';
        }
        header('Location: /task/' . $id . '?' . http_build_query(['error' => $condition]));
    }
}