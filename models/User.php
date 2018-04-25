<?php

namespace app\models;

class User extends Model
{
    private  static $columns = [
        'login',
        'password',
        'name',
        'phone',
        'e_mail',
        'last_login',
        'account'
    ];

    public function getTableName()
    {
        return 'users';
    }
}