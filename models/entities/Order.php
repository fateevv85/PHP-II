<?php
namespace app\models;

use app\models\entities\DataEntity;

class Order extends DataEntity
{
    public $customer_id;
    public $product_id;
    public $count;

    public static function getTableName()
    {
        return 'orders';
    }
}