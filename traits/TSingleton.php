<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 25.04.2018
 * Time: 12:18
 */

namespace app\traits;


trait TSingleton
{
    private static $instance;

    private function __construct(){}
    private function __clone(){}
    private function __wakeup(){}

    public static function getInstance()
    {
        if(is_null(static::$instance)) {
            //это равносильно static::$instance = new Db(), ссылка на текущий класс
            static::$instance = new static();
        }
        return static::$instance;
    }
}
