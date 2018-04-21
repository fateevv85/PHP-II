<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 20.04.2018
 * Time: 18:16
 */

namespace app\models;


class Order extends Model
{
    public $id;
    public $userId;
    public $productId;
    public $count;
    public $date;

    public function getTableName()
    {
        return 'orders';
    }
}