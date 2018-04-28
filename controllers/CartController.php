<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 29.04.2018
 * Time: 0:49
 */

namespace app\controllers;


class CartController extends Controller
{
    public function actionIndex()
    {
        echo $this->renderLayout('cart.php', []);
    }
}