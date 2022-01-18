<?php


namespace app\Models\Task;


class User
{
    private int $id;

    private string $Name;

    private string $Email;

    private string $Password;

    private array $tasks = [];

    private bool $isLoggedIn = false;

    public function __construct($id, $name, $email, $password = '')
    {
        $this->id = $id;
        $this->Name = $name;
        $this->Email = $email;
        $this->Password = $password;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->Email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->Password;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->Name;
    }

    /**
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        return $this->isLoggedIn;
    }

    /**
     * @param bool $isLoggedIn
     */
    public function setIsLoggedIn(bool $isLoggedIn): void
    {
        $this->isLoggedIn = $isLoggedIn;
    }
}