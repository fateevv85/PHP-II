<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 15.05.2018
 * Time: 16:16
 */

namespace app\controllers;

use app\base\App;
use app\models\repositories\OrdersRepository;
use app\models\repositories\UsersRepository;
use app\services\Sessions;

class LoginController extends Controller
{
    public function actionIndex()
    {
        $message = (new Sessions())->get('login');
        if (!$message && (new Sessions())->get('tryToLogin')) {
            $message = 'incorrect_login';
        }
        echo $this->renderLayout('login.php', ['message' => $message]);
    }

    public function actionLogin()
    {
        $login = App::call()->request->getParams()['login'];
        $password = App::call()->request->getParams()['password'];
        $user = (new UsersRepository())->getUser($login, $password);

        if ($user) {
            (new Sessions())->set('login', $user->login);
            (new Sessions())->set('user_id', $user->id);
            header('Location:http://php-ii/public/cart');
        } else {
            (new Sessions())->set('login', false);
            (new Sessions())->set('tryToLogin', 1);
            header('Location:http://php-ii/public/login');
        }
    }

    public function actionLogout()
    {
        (new Sessions())->set('login', false);
        (new Sessions())->set('tryToLogin', 0);
        (new Sessions())->destroy();
        header('Location:http://php-ii/public/login');
    }

    public static function checkLogin() {
        $login = (new Sessions())->get('login');
        if (!$login) {
            header('Location:http://php-ii/public/login');
        } else {
            return $login;
        }
    }
}
