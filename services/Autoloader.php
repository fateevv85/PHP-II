<?php
namespace app\services;

class Autoloader
{
    private $fileExtension = '.php';

    public function loadClass($className)
    {
//        $filename = preg_replace(['#app\\\#', '#\\/#'], [ROOT_DIR . DS, DS], $className);
        $filename = preg_replace(['#app\\\#', '#\\/#'], [__DIR__ . "/../", DS], $className);
        $filename .= $this->fileExtension;
        if (file_exists($filename)) {
            include $filename;
        }
    }
}