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
    private static $columns = [
        'customer_id',
        'product_id',
        'count'
    ];

    public function getTableName()
    {
        return 'orders';
    }
}