<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 14.05.2018
 * Time: 22:50
 */

namespace app\base;

use app\traits\TSingleton;

class App
{
    use TSingleton;

    public $config;
    private $controller;
    private $action;
    private $components;

    public static function call()
    {
        return static::getInstance();
    }

    public function run($config)
    {
        $this->config = $config;
        $this->components = new Storage();
        $this->runController();
    }

    public function createComponent($name)
    {
        if (isset($this->config['components'][$name])) {
            $params = $this->config['components'][$name];
            $class = $params['class'];

            if (class_exists($class)) {
                unset($params['class']);
                $reflection = new \ReflectionClass($class);
                return $reflection->newInstanceArgs($params);
            }
        };
        return null;
    }

    public function runController()
    {
        $this->controller = $this->request->getControllerName() ?: 'product';
        $this->action = $this->request->getActionName();

        $controllerClass = $this->config['controllers_namespace'] .
            ucfirst($this->controller) . 'Controller';

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass(
                new \app\services\TemplateRenderer()
            );
            $controller->runAction($this->action);
        }
    }

    public function __get($name)
    {
        return $this->components->get($name);
    }
}
