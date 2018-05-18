<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 29.04.2018
 * Time: 0:49
 */

namespace app\controllers;


use app\models\entities\Product;
use app\services\Sessions;

class CartController extends Controller
{
    public function actionIndex()
    {
        $login = (LoginController::class)::checkLogin();
        echo $this->renderLayout('cart.php', ['userName' => $login]);
    }

    public function actionAddToCart(Product $entity)
    {
        (new Sessions())->set('cart', $entity->id);
        header('Location:http://php-ii/public/product');
    }
}
