<?php
namespace app\interfaces;

interface IDbModel
{
//    public static function getOne($id);

//    public static function getAll();

//    public function insert();

//    public function update();

    public function delete();

    public function save();

    public static function getTableName();
}