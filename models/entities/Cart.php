<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 20.04.2018
 * Time: 18:16
 */

namespace app\models\entities;

use app\models\entities\DataEntity;
use app\models\entities\Product;
use app\services\Sessions;

class Cart extends DataEntity
{
    public $id;

    public static function getTableName()
    {
        return 'cart';
    }


}