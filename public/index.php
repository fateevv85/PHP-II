<?php

include $_SERVER['DOCUMENT_ROOT'] . "/config/main.php";
include ROOT_DIR . "/services/Autoloader.php";

spl_autoload_register([new app\services\Autoloader(), 'loadClass']);

$product = \app\models\Product::getOne(13, 1);
$product1 = new app\models\Product(
    66,
    'Big_Book',
    '2',
    1,
    300,
    2,
    'very beautiful book',
    'picture_small',
    'picture'
);
//$product->insert();
//$product->price = 222;
//$product->description = 'OOOOO';
//var_dump($product1);
//$product1->save();
//$product->save();
var_dump($product);

//var_dump($product1);
//$product1->save();
//var_dump(\app\models\Product::getAll());
//var_dump(\app\models\Product::deleteStrings([22,23,24]));

/*\app\models\Product::insert([
    'Big_Book',
    '2',
    1,
    300,
    2,
    'very beautiful book',
    'picture_small',
    'picture'
]);*/

//var_dump($product);
/*$product->update([
    'title' => 'Mini_book',
    'price' => 600
]);*/

//$product->delete();
//var_dump($product);