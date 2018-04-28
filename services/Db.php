<?php

namespace app\services;

//use app\models\Product;
use app\traits\TSingleton;

class Db
{
    use TSingleton;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'root',
        'password' => '1234',
        'database' => 'books',
        'charset' => 'utf8'
    ];

    public $conn = null;

    private static $instance = null;

    private function getConnection()
    {
        if (is_null($this->conn)) {
            $this->conn = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );
            $this->conn->setAttribute(
                \PDO::ATTR_DEFAULT_FETCH_MODE,
                \PDO::FETCH_ASSOC
            );
        }
        return $this->conn;
    }

    private function prepareDsnString()
    {
        return sprintf("%s:host=%s;dbname=%s;charset = %s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }

    private function query($sql, $params)
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
//        $pdoStatement->bindValue(':id', $params);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function execute($sql, $params)
    {
        $this->query($sql, $params);
        return true;
    }

    public function queryOne($sql, $params)
    {
        return $this->query($sql, $params)->fetch();
    }

    public function queryAll($sql)
    {
        return $this->query($sql, null)->fetchAll();
    }

    public function getObject($sql, $params, $class)
    {
        $query = $this->query($sql, $params);
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);

        return $query->fetch();
    }

    public function getObjects($sql, $class)
    {
        $query = $this->query($sql, $params = null)->fetchAll(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);

        return $query;
    }

    public function lastInsertId()
    {
        return $this->conn->lastinsertid();
    }
}