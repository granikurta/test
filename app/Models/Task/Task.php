<?php

namespace app\Models\Task;

class Task
{
    private int $id;

    private string $text;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}