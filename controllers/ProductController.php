<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 28.04.2018
 * Time: 21:48
 */

namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{
    public function actionIndex()
    {
        echo 'catalog';
    }

    public function actionCard()
    {
        $id = $_GET['id'];
        $product = Product::getOne($id, 1);
        echo $this->renderLayout('card.php', ['product' => $product]);
    }
}