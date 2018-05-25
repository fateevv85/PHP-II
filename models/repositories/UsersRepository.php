<?php

namespace app\models\repositories;
use app\base\App;
use app\models\Repository;
use app\models\entities\User;

class UsersRepository extends Repository
{
	public function getTableName() {
		return "customers";
	}
	
	public function getEntityClass() {
		return User::class;
	}

    public function getUser($login, $password)
    {
        $tableName = $this->getTableName();
        $passHash = md5($password);
        $sql = "SELECT * FROM {$tableName} WHERE login = :login AND password = :password";
        $option = App::call()->db->getObject($sql, [':login' => $login, ':password' => $passHash], $this->getEntityClass());

        return $option;
    }

    public function checkUser($login)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE login = :login";
        $option = App::call()->db->getObject($sql, [':login' => $login], $this->getEntityClass());

        return $option;
    }
}
