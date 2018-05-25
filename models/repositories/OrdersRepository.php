<?php

namespace app\models\repositories;

use app\base\App;
use app\models\entities\DataEntity;
use app\models\Repository;
use app\models\entities\Order;

class OrdersRepository extends Repository
{
    public function getTableName()
    {
        return "order_products";
    }

    public function getEntityClass()
    {
        return Order::class;
    }

    public function getAll($id = null)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT product.id,
                       product.title,
                       publisher.name,
                       category.name,
                       product.price,
                       author.name,
                       product.picture_small_url,
                       count
                       FROM {$tableName} 
                       LEFT JOIN product ON order_products.product_id = product.id
                       LEFT JOIN author ON product.author_id = author.id
                       LEFT JOIN publisher ON product.publisher_id = publisher.id
                       LEFT JOIN category ON product.category_id = category.id
                       WHERE customer_id = :id";
        $option = App::call()->db->getObjects($sql, $this->getEntityClass(), [':id' => $id]);

        return $option;
    }
}
