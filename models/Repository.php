<?php

namespace app\models;

use app\models\exceptions\WrongItem;
use app\models\entities\DataEntity;
use app\base\App;

abstract class Repository
{
    protected $db;
    protected $propFromDb = [];

    public function __construct()
    {
        $this->db = App::call()->db;
    }

    abstract public function getEntityClass();

    public function getOne($id, $sql = null)
    {
        $tableName = $this->getTableName();
        if (!$sql) {
            $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        }
//        $option = (is_null($object)) ?
//            App::call()->db->queryOne($sql, [':id' => $id]) :
        $option = App::call()->db->getObject($sql, [':id' => $id], $this->getEntityClass());

        if ($option) {
            $option->propFromDb = $option->getPublicVars();
        } else {
            throw new WrongItem();
        }

        return $option;
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        $option = App::call()->db->getObjects($sql, $this->getEntityClass());

        return $option;
    }

    abstract public function getTableName();

    public function insert(DataEntity $entity)
    {
        $tableName = $this->getTableName();
        $fields = $entity->getPublicVars();
        $columns = [];
        $params = [];

        foreach ($fields as $key => $value) {
            if ($key == 'id' && is_null($value)) {
                continue;
            }
            if ($key == 'password') {
                $value = md5($value);
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
        return $this->id;
    }

    private function update($arr = [])
    {
        foreach ($arr as $key => $value) {
            $string[] = "`{$key}`='{$value}'";
        }

        $tableName = $this->getTableName();
        $string = implode(', ', $string);
        $sql = "UPDATE {$tableName} SET {$string} WHERE id = :id";

        return $this->db->execute($sql, [':id' => $this->id]);
    }

    public function delete(DataEntity $entity)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";

        return $this->db->execute($sql, [':id' => $entity->id]);
    }

    public function save(DataEntity $entity)
    {
        if ($entity->propFromDb) {
            $fieldsChanged = array_diff($this->getPublicVars(), $entity->propFromDb);
            $this->update($fieldsChanged);
        } else {
            $this->insert($entity);
        };
    }
}
