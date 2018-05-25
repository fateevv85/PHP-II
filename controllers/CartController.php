<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 29.04.2018
 * Time: 0:49
 */

namespace app\controllers;


use app\base\App;
use app\models\entities\Order;
use app\models\repositories\OrdersRepository;
use app\models\repositories\ProductRepository;
use app\services\Sessions;

class CartController extends Controller
{
    public function actionIndex()
    {
        $login = (LoginController::class)::checkLogin();
        $cart = (new Sessions())->get('cart');
        if ($cart) {
            $books = (new ProductRepository())->getAll($cart);
        }
        echo $this->renderLayout('cart.php', ['userName' => $login, 'books' => $books]);
    }

//    public function actionAddToCart(Product $entity)
    public function actionAddToCart()
    {
        (LoginController::class)::checkLogin();
        $id = App::call()->request->getParams()['id'];
        $cart = (new Sessions())->get('cart');
        if ($id) {
            if (!$cart || !in_array($id, $cart)) {
                (new Sessions())->add('cart', $id);
                $message = 'Item is added!';
            } else {
                $message = 'Item is already in cart!';
            }
        }
        echo $message;
    }

    public function actionDeleteItem()
    {
        (LoginController::class)::checkLogin();
        $id = App::call()->request->getParams()['id'];
        $cart = (new Sessions())->get('cart');
        if ($id && $cart) {
            (new Sessions())->delete($id);
            $message = 'ok';
        }
        echo $message;
    }

    public function actionDeleteAll()
    {
        (LoginController::class)::checkLogin();
        (new Sessions())->deleteAll();
        echo "cart is clear";
    }

    public function actionSaveCart()
    {
        (LoginController::class)::checkLogin();
        $order = App::call()->request->getParams()['order'];
        $user = (new Sessions())->get('user_id');

        foreach ($order as $key => $value) {
//            $string[] = "($user, {$value['id']},  {$value['count']})";
            
            $newOrder = (new Order($user, $product_id, $count));
            (new OrdersRepository())->insert($newOrder);
        }
//        $order = (new Order());
        session_start();
        var_dump($_SESSION);
//        var_dump($order);
        var_dump($_REQUEST);
    }


}
