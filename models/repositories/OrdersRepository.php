<?php

namespace app\models\repositories;
use app\models\entities\DataEntity;
use app\models\Repository;
use app\models\entities\Order;

class OrdersRepository extends Repository
{
	public function getTableName() {
		return "order_products";
	}
	
	public function getEntityClass() {
		return Order::class;
	}
/*
	public function insert(DataEntity $entity) {

	    $fields = $entity->getPublicVars();
        $columns = [];
        $params = [];

        foreach ($fields as $key => $value) {
            if ($key == 'id' && is_null($value)) {
                continue;
            }
            if ($key == 'password') {
                $value = md5($value);
            }
            if($key == 'order') {

            }

            $columns[] = "`{$key}`";
            $params[":{$key}"] = $value;
        }

        return parent::insert($entity);
    }
*/
}