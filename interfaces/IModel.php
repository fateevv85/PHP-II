<?php
namespace app\interfaces;

interface IModel
{
    public function getOne($id);

    public function getAll();

    public function insertRow();

    public function updateProperty($id);

    public function deleteItem($id);
}