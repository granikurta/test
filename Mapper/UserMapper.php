<?php


namespace Mapper;


use app\Models\User;

class UserMapper
{
    /**
     * @param array $property
     * @return User
     */
    public function buildUserEntity(array $property): User
    {
        return new User($property['Id'], $property['Name'], $property['Email'], $property['Password']);
    }
}