<?php
namespace app\models;

use app\interfaces\IDbModel;
use app\services\Db;

abstract class Repository {
	
	public function getOne($id, $object = null)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        $option = (is_null($object)) ?
            Db::getInstance()->queryOne($sql, [':id' => $id]) :
            Db::getInstance()->getObject($sql, [':id' => $id], $this->getEntityClass());
        $option->propFromDb = $option->getPublicVars();

        return $option;
    }

    public function getAll($object = null)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        $option = (is_null($object)) ?
            Db::getInstance()->queryAll($sql) :
            Db::getInstance()->getObjects($sql, $this->getEntityClass());

        return $option;
    }
	
	abstract public function getTableName();
	
	 private function insert(DataEntity $entity)
    {
        $tableName = $this->getTableName();
        $columns = [];
        $params = [];
        $fields = $entity->getPublicVars();

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
/*
    protected function getPublicVars()
    {
        return call_user_func('get_object_vars', $this);
    }
*/	
	protected $db;
    protected $propFromDb = [];

    public function __construct()
    {
        $this->db = Db::getInstance();
    }
	
	abstract public function getEntityClass();
}