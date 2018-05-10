<?php

namespace app\models;

use app\services\Db;

abstract class DataEntity extends Model
{

public function getPublicVars()
    {
        return call_user_func('get_object_vars', $this);
    }
	
/*
    public static function deleteStrings($id = [])
    {
        foreach ($id as $key => $value) {
            $params[":id{$key}"] = $value;
        }

        $tableName = static::getTableName();
        $placeholder = implode(', ', array_keys($params));
        $sql = "DELETE FROM {$tableName} WHERE id IN ({$placeholder})";

        return Db::getInstance()->execute($sql, $params);
    }
	*/
}
