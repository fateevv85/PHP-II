<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 28.04.2018
 * Time: 21:48
 */

namespace app\controllers;

use app\models\entities\Product;
use app\models\repositories\ProductRepository;
use app\services\Request;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $product = (new ProductRepository())->getAll(1);
        echo $this->renderLayout('catalog.php', ['product' => $product]);
    }

    public function actionCard()
    {
        $id = (new Request())->getParams()['id'];
        $product = (new ProductRepository())->getOne($id, 1);
        echo $this->renderLayout('card.php', ['product' => $product]);
    }
}