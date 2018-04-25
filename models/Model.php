<?php

namespace app\models;

use app\interfaces\IModel;
use app\services\Db;

abstract class Model implements IModel
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";
        return $this->db->queryOne($sql, [':id' => $id]);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return $this->db->queryAll($sql);
    }

    public function insertRow($arr = [])
    {
        $values = implode("', '", $arr);
        $sql = "INSERT INTO {$this->getTableName()} ({$this->getColumnsName()})
              VALUES ('{$values}')";
        return $this->db->execute($sql);
    }

    public function updateProperty($id, $arr = [])
    {
        foreach ($arr as $key => $value) {
            $string[] = $key . "='" . $value . "'";
        }
        $string = implode(', ', $string);

        $sql = "UPDATE {$this->getTableName()} SET {$string} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $id]);
    }

    public function deleteItem($id)
    {
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $id]);
    }

    abstract public function getTableName();

    protected function getColumnsName()
    {
        return implode(', ', static::columns);
    }
}