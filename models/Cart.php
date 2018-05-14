<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 20.04.2018
 * Time: 18:16
 */

namespace app\models;

use app\models\entities\Product;
use app\services\Sessions;

class Cart extends DbModel
{
    public $id;
    public $orderId;

    public static function getTableName()
    {
        return 'cart';
    }

    public function addToCart(Product $entity)
    {
        (new Sessions())->set('cart', $entity->id);
    }
}