<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 14.05.2018
 * Time: 22:31
 */

namespace app\models\exceptions;

class BadRequest extends \Exception {
    protected $message = "invalid request";
    protected $code = 404;
}