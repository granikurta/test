<?php


namespace app\Models;


use core\Connection\MysqlConnection;
use core\Library\Manager;
use Mapper\UserMapper;
use PDO;

class UserManager extends MysqlConnection implements Manager
{
    private UserMapper $mapper;

    public function __construct()
    {
        $this->mapper = new UserMapper();
        parent::__construct();
    }

    public function getUserByEmail($email)
    {

        $stmt = $this->pdo()->prepare("SELECT * FROM User WHERE Email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (empty($user)) {
            return [];
        }
        return $this->mapper->buildUserEntity($user);
    }

    public function loginInWitchPassword(User $user, string $password): bool
    {
        if ($user->getPassword() !== $password) {
            return false;
        }
        session_start();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $user->getName();
        $_SESSION['id'] = $user->getId();
        $user->SetisLoggedIn(true);
        return true;
    }
}