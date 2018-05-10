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
    public  $templater;
	
	public function __construct () {
		$loader = new \Twig_Loader_Filesystem('../views/');
		$this->templater = new \Twig_Environment($loader);
	}
	
    public function render($template, $params = [])
    {
       return $this->templater->render($template, $params);
    }

}