<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 20.04.2018
 * Time: 18:16
 */

namespace app\models;


class Cart extends DbModel
{
    public $id;
    public $orderId;

    public static function getTableName()
    {
        return 'cart';
    }
}