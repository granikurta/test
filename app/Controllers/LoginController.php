<?php


namespace app\Controllers;


use app\Models\Task\UserManager;
use app\View;

class LoginController
{
    public function index()
    {
        $condition = [];
        if (isset($_GET['error'])) {
            $condition = $_GET['error'];
        }
        $view = new View('Login', ['condition' => $condition]);
        $view->render();
    }

    public function login()
    {
        $condition = [
            'error' => [],
            'status' => []
        ];
        if (empty($_POST['email'])) {
            $condition['error'][] = 'Input email is empty';
        }
        if (empty($_POST['pswd'])) {
            $condition['error'][] = 'Input password is empty';
        }
        if (!empty($condition['error'])) {
            header('Location: /login?' . http_build_query(['error' => $condition]));
        }
        $email = $_POST['email'];
        $pswd = $_POST['pswd'];

        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($email);

        if (empty($user)) {
            $condition['error'][] = 'User with this email not found';
            header('Location: /login?' . http_build_query(['error' => $condition]));
        }

        $isLoggedIn = $userManager->loginInWitchPassword($user, $pswd);

        if (!$isLoggedIn) {
            $condition['error'][] = 'Unknown error';
            header('Location: /login?' . http_build_query(['error' => $condition]));
        }
        header('Location: /');
    }
}