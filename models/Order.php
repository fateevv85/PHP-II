<?php
namespace app\models;

class Order extends DbModel
{
    public $customer_id;
    public $product_id;
    public $count;

    public static function getTableName()
    {
        return 'orders';
    }
}