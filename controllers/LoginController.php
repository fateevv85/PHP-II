<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 15.05.2018
 * Time: 16:16
 */

namespace app\controllers;

use app\base\App;
use app\models\repositories\UsersRepository;

class LoginController extends Controller
{
    public function actionIndex()
    {
        echo $this->renderLayout('login.php', []);
    }

    public function loginCheck() {
        $login = App::call()->request->getParams()['login'];
        $password = App::call()->request->getParams()['password'];
        $user = (new UsersRepository())->getUser($login, $password, 1);
        var_dump($user);
    }
}