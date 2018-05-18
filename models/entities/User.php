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

    public function __construct($login = null, $password = null, $name = null, $phone = null, $e_mail = null,$account = null, $last_login = null)
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
}
