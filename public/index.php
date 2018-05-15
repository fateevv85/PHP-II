<?php
define('DS', DIRECTORY_SEPARATOR);
include __DIR__ . "/../services/Autoloader.php";
include __DIR__ . "/../vendor/autoload.php";

spl_autoload_register([new app\services\Autoloader(), 'loadClass']);
$config = include __DIR__ . "/../config/main.php";
(app\base\App::call()->run($config));

var_dump($_SESSION);

//$product = \app\models\Product::getOne(13, 1);
//var_dump($product);
//var_dump(\app\models\Product::getAll(1));
/*$product1 = new app\models\Product(
    14,
    'Big_Book',
    '2',
    1,
    300,
    2,
    'very beautiful book',
    'picture_small',
    'picture'
);*/
//var_dump($product1);
//$product->price = 777;
//$product->description = 'SS-SS';
//$product->description = 'OOOOO';
//$product->save();
//var_dump(\app\models\Product::getAll());
//var_dump(\app\models\Product::deleteStrings([22,23,24]));
//$product->delete();
