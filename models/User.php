<?php

namespace app\models;

class User extends Model
{
    public $login;
    public $password;
    public $name;
    public $phone;
    public $e_mail;
    public $last_login;
    public $account;

    public static function getTableName()
    {
        return 'users';
    }
}