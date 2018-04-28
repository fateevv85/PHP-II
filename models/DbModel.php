<?php

namespace app\models;

use app\interfaces\IDbModel;
use app\services\Db;

abstract class DbModel extends Model implements IDbModel
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public static function getOne($id, $object = null)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        $option = (is_null($object)) ?
            Db::getInstance()->queryOne($sql, [':id' => $id]) :
            Db::getInstance()->getObject($sql, [':id' => $id], get_called_class());

        return $option;
    }

    public static function getAll($object = null)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        $option = (is_null($object)) ?
            Db::getInstance()->queryAll($sql) :
            Db::getInstance()->getObjects($sql, get_called_class());

        return $option;
    }

    private function insert()
    {
        $tableName = static::getTableName();
        $columns = [];
        $params = [];
        $fields = $this->getPublicVars();

        foreach ($fields as $key => $value) {
            if ($key == 'id' && is_null($value)) {
                continue;
            }
            $columns[] = "`{$key}`";
            $params[":{$key}"] = $value;
        }

        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));
        $sql = "INSERT INTO {$tableName} ({$columns})
                VALUES ({$placeholders})";
        $this->db->execute($sql, $params);
        $this->id = $this->db->lastInsertId();
    }

    private function update($arr = [])
    {
        foreach ($arr as $key => $value) {
            $string[] = "`{$key}`='{$value}'";
        }

        $tableName = static::getTableName();
        $string = implode(', ', $string);
        $sql = "UPDATE {$tableName} SET {$string} WHERE id = :id";

        return $this->db->execute($sql, [':id' => $this->id]);
    }

    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";

        return $this->db->execute($sql, [':id' => $this->id]);
    }

    public function save()
    {
        $object = self::getOne($this->id, 1);

        if ($object) {
            $fields = $this->getPublicVars();
            $fieldsFromDb = array_intersect_key(get_object_vars($object), $fields);
            $fieldsChanged = array_diff($fields, $fieldsFromDb);
            $this->update($fieldsChanged);
        } else {
            $this->insert();
        };
    }

    private function getPublicVars()
    {
        return call_user_func('get_object_vars', $this);
    }

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
}
