<?php

namespace app\services;

use app\models\exceptions\BadRequest;

class Request
{
    private $requestString;
    private $controllerName;
    private $actionName;
    private $params;
    private $method;

    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }

    private function parseRequest()
    {
//		$pattern = "#/(php-ii)/(public)/(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";
        $pattern = "#/(public)/(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";
        $this->method = $_SERVER['REQUEST_METHOD'];
        if (preg_match_all($pattern, $this->requestString, $matches)) {
            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];
            $this->params = $_REQUEST;
        } else {
            throw new BadRequest();
        }
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function getParams()
    {
        return $this->params;
    }
}