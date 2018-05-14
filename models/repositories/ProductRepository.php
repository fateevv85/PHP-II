<?php

namespace app\models\repositories;

use app\models\Repository;
use app\models\entities\Product;

class ProductRepository extends Repository
{
	public function getTableName() {
		return "product";
	}
	
	public function getEntityClass() {
		return Product::class;
	}

	public function getByCategory() {

    }
}