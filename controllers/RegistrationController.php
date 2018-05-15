<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 15.05.2018
 * Time: 16:16
 */

namespace app\controllers;


class RegistrationController extends Controller
{
    public function actionIndex()
    {
        echo $this->renderLayout('registration.php', []);
    }
}