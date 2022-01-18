<?php


namespace Mapper;


use app\Models\Task\Task;
use app\Models\User;

class TaskMapper extends Mapper
{

    /**
     * @param $rawData
     * @return array
     */
    public function buildTaskAndUser($rawData): array
    {
        $result = [];
        foreach ($rawData as $key => $item) {
            $task = $this->buildTaskEntity($item);
            $user = new User($item['UserId'], $item['Name'], $item['Email']);
            $task->setOwner($user);
            $result[$key] = $task;
        }
        return $result;
    }

    /**
     * @param array $property
     * @return Task
     */
    public function buildTaskEntity(array $property): Task
    {
        return new Task($property['Id'], $property['Title'], $property['Body'], $property['Status'], $property['Timestamp']);
    }

}