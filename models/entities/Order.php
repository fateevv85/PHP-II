<?php
namespace app\models\entities;



use app\services\Sessions;

class Order extends DataEntity
{
    public $customer_id;
    public $product_id;
    public $count;

    public function __construct($customer_id = null, $product_id = null, $count = null)
    {
        $this->customer_id = $customer_id;
        $this->product_id = $product_id;
        $this->count = $count;
    }

    public static function getTableName()
    {
        return 'order_products';
    }
}