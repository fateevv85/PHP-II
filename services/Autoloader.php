<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 20.04.2018
 * Time: 12:04
 */

namespace app\services;

class Autoloader
{
    public function loadClass($className)
    {

        $className = preg_replace('#app\\\#', '', $className);

        $filename = $_SERVER['DOCUMENT_ROOT'] . "/{$className}.php";
        if (file_exists($filename)) {
            include $filename;
        }
    }
}