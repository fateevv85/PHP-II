<?php

namespace app\models\repositories;

use app\base\App;
use app\models\Repository;
use app\models\entities\Product;

class ProductRepository extends Repository
{
    public function getTableName()
    {
        return "product";
    }

    public function getEntityClass()
    {
        return Product::class;
    }

    public function getOne($id, $sql = null)
    {
        $sql = "SELECT product.*, 
        author.name AS `author`,
        publisher.name AS `publisher`,
        category.name AS `category` FROM product
        LEFT JOIN author ON product.author_id = author.id
        LEFT JOIN publisher ON product.publisher_id = publisher.id
        LEFT JOIN category ON product.category_id = category.id
        WHERE product.id = :id";
        return parent::getOne($id, $sql);
    }

    public function getAll($param = null)
    {
        $sql = "SELECT product.title, 
        product.price as `price`,
        author.name AS `author`,
        category.name AS `category`,
        product.picture_small_url,
        product.id,
        publisher.name AS `publisher`
        FROM product 
        LEFT JOIN author ON product.author_id = author.id
        LEFT JOIN publisher ON product.publisher_id = publisher.id
        LEFT JOIN category ON product.category_id = category.id";

        if ($param) {
            if (is_string($param)) {
                $objSelect = " WHERE category.id = :category";
                $params[':category'] = $param;
                $sql .= $objSelect;
            } elseif (is_array($param)) {
                $param = implode(',', $param);
                $objSelect = " WHERE product.id in ({$param})";
                $sql .= $objSelect;
            }
        }

        $option = App::call()->db->getObjects($sql, $this->getEntityClass(), $params);

        return $option;
    }

    public function getCategories()
    {
        $sql = "SELECT * FROM category";
        $option = App::call()->db->queryAll($sql);

        return $option;
    }
}