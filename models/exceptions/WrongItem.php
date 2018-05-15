<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 14.05.2018
 * Time: 22:33
 */

namespace app\models\exceptions;


class WrongItem extends BadRequest
{
    protected $message = 'Wrong product Id!';
}