<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 30.04.2018
 * Time: 14:07
 */

namespace app\services;

use app\interfaces\IRenderer;

class TemplateRenderer implements IRenderer
{
    public function render($template, $params = [])
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