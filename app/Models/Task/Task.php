<?php

namespace app\Models\Task;

use app\Models\User;

class Task
{

    private array $labels = ['In process..', 'Finished'];
    /**
     * @var int
     */
    private int $Id;

    /**
     * @var string
     */
    private string $Title;

    /**
     * @var string
     */
    private string $Body;

    /**
     * @var string
     */
    private string $Status;

    /**
     * @var string
     */
    private string $Timestamp;

    /**
     * @var User
     */
    private $owner;


    public function __construct($id, $title, $body, $status, $timestamp = '')
    {
        $this->Id = $id;
        $this->Title = $title;
        $this->Body = $body;
        $this->Status = $status;
        $this->Timestamp = $timestamp;
    }

    /**
     * @param User $owner
     */
    public function setOwner(User $owner): void
    {
        $this->owner = $owner;
    }

    /**
     * @return string
     */
    public function getOwnerEmail(): string
    {
        return $this->owner->getEmail();
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->Body;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->Id;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->Status;
    }

    /**
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->Timestamp;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->Title;
    }

    public function getLabelByStatus()
    {
        $status = $this->getStatus();
        return $this->labels[$status];
    }


}