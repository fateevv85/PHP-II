<?php

namespace app\controllers;

use app\base\App;
use app\models\entities\User;
use app\models\repositories\UsersRepository;
use app\services\Sessions;

class RegistrationController extends Controller
{
    public function actionIndex()
    {
        $message = (new Sessions())->get('messageReg');
        echo $this->renderLayout('registration.php', ['login' => $message]);
    }

    public function actionNewUser()
    {
        $login = App::call()->request->getParams()['new_login'];
        $password = App::call()->request->getParams()['new_pass'];
        $name = App::call()->request->getParams()['new_name'];
        $phone = App::call()->request->getParams()['new_phone'];
        $email = App::call()->request->getParams()['new_mail'];
        $date = date('Y-m-d H-i-s');
        $newUser = new User(null, $login, $password, $name, $phone, $email, 'user', $date);
        //проверка на существование login
        /**
         * todo
         * better use AJAX then user typing login in registration form
         */
        $user = (new UsersRepository())->checkUser($login);
        if ($user) {
            (new Sessions())->set('messageReg', $login);
            header('Location:http://php-ii/public/registration');
        } else {
            (new Sessions())->set('messageReg', false);
            (new Sessions())->set('login', $login);
            $user_id = (new UsersRepository())->insert($newUser);
            (new Sessions())->set('user_id', $user_id);
            header('Location:http://php-ii/public/cart');
        }
    }
}
