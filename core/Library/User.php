<?php


namespace core\Library;


class User
{
    public static function isGuest()
    {

        return !isset($_SESSION['loggedin']);
    }
}