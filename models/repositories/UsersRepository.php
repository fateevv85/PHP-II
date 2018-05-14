<?php

namespace app\models\repositories;
use app\models\Repository;
use app\models\User;

class UsersRepository extends Repository
{
	public function getTableName() {
		return "customers";
	}
	
	public function getEntityClass() {
		return User::class;
	}
}