<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 30.04.2018
 * Time: 15:21
 */

namespace app\services;

use app\interfaces\IRenderer;

class TwigRenderer implements IRenderer
{
    public  $loader;
    public function render($template, $params = [])
    {
        $this->loader = new Twig_Loader_Filesystem('../views/');

        echo '!!!!!!!!!!!!!';
    }

}