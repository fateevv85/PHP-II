<?php

include $_SERVER['DOCUMENT_ROOT'] . "/config/main.php";
include ROOT_DIR . "/services/Autoloader.php";
require_once VENDOR_DIR . 'autoload.php';

spl_autoload_register([new app\services\Autoloader(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass = CONTROLLERS_NAMESPACE .
    ucfirst($controllerName) . 'Controller';

$loader = new Twig_Loader_Filesystem('../views/');
$twig = new Twig_Environment($loader);
echo $twig->render('card.html', array('text' => 'Hello world!'));

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(
        new \app\services\TwigRenderer()
    );
    $controller->runAction($actionName);
}

/*if (class_exists($controllerClass)) {
    $controller = new $controllerClass(
        new \app\services\TwigRenderer()
    );
    $controller->runAction($actionName);
}*/

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
