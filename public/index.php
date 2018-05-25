<?php
define('DS', DIRECTORY_SEPARATOR);
include __DIR__ . "/../services/Autoloader.php";
include __DIR__ . "/../vendor/autoload.php";

spl_autoload_register([new app\services\Autoloader(), 'loadClass']);
$config = include __DIR__ . "/../config/main.php";
(app\base\App::call()->run($config));
