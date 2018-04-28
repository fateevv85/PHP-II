<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 29.04.2018
 * Time: 0:05
 */

namespace app\controllers;


abstract class Controller
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'mainLayout';
    private $useLayout = true;

    public function runAction($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = 'action' . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo '404';
        }
    }

    public function renderLayout($template, $params = [])
    {
        $content = $this->renderTemplate($template, $params);
        if ($this->useLayout) {
            $content = $this->renderTemplate("layouts/{$this->layout}.php", ['content' => $content]);
        }
        return $content;
    }

    public function renderTemplate($template, $params = [])
    {
        ob_start();
        extract($params);

        if (is_array($template)) {
            foreach ($template as $value) {
                include TEMPLATES_DIR . "/{$value}";
            }
        } else {
            include TEMPLATES_DIR . "/{$template}";
        }

        return ob_get_clean();
    }
}