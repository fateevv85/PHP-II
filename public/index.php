<?php

include $_SERVER['DOCUMENT_ROOT'] . "/config/main.php";
include ROOT_DIR . "/services/Autoloader.php";

spl_autoload_register([new app\services\Autoloader(), 'loadClass']);

$product = new app\models\Product();

//var_dump($product->getOne(1));
var_dump($product->getAll());

/*$product->insertRow([
    'Big_Book',
    '2',
    1,
    300,
    2,
    'very beautiful book',
    'picture_small',
    'picture'
]);*/


/*$product->updateProperty(7, [
    'title' => 'Mini_book',
    'price' => 1100
]);*/

//$product->deleteItem(7);