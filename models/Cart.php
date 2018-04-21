<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 20.04.2018
 * Time: 18:16
 */

namespace app\models;


class Cart extends Model
{
    public $id;
    public $orderId;

    public function getTableName()
    {
        return 'cart';
    }


}