<?php

include $_SERVER['DOCUMENT_ROOT'] . "/config/main.php";
include ROOT_DIR . "/services/Autoloader.php";

spl_autoload_register([new app\services\Autoloader(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . 'Controller';
//var_dump($_GET);
//http://php-ii/public/index.php?c=product&action=catalog
//var_dump($controllerClass);
//http://php-ii/public/index.php?c=product&a=card&id=1
if(class_exists($controllerClass)) {
    $controller = new $controllerClass;
    $controller->runAction($actionName);
}

//$product = \app\models\Product::getOne(13, 1);
//var_dump($product);
//var_dump(\app\models\Product::getAll(1));
/*$product1 = new app\models\Product(
    66,
    'Big_Book',
    '2',
    1,
    300,
    2,
    'very beautiful book',
    'picture_small',
    'picture'
);*/
//$product->price = 222;
//$product->description = 'OOOOO';
//$product1->save();
//var_dump(\app\models\Product::getAll());
//var_dump(\app\models\Product::deleteStrings([22,23,24]));
//$product->delete();
