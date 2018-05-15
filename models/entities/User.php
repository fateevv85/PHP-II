<?php

namespace app\models\entities;

class User extends DataEntity
{
    public $login;
    public $password;
    public $name;
    public $phone;
    public $e_mail;
    public $last_login;
    public $account;

    public function __construct($login, $password, $name, $phone, $e_mail, $last_login, $account)
    {
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
        $this->phone = $phone;
        $this->e_mail = $e_mail;
        $this->last_login = $last_login;
        $this->account = $account;
    }

    public static function getTableName()
    {
        return 'customers';
    }

    public static function login() {

    }

}