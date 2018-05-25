<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 30.04.2018
 * Time: 15:11
 */

namespace app\interfaces;


interface IRenderer
{
    public function render($template, $params = []);
}
