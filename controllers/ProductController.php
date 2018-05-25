<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 28.04.2018
 * Time: 21:48
 */

namespace app\controllers;

use app\base\App;
use app\models\exceptions\WrongItem;
use app\models\repositories\ProductRepository;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $category = (new ProductRepository())->getCategories();
        $categorySelect = App::call()->request->getParams()['category'];
        $product = (new ProductRepository())->getAll($categorySelect);

        echo $this->renderLayout('catalog.php', ['product' => $product, 'category' => $category]);
    }

    public function actionCard()
    {
        $id = App::call()->request->getParams()['id'];
        try {
            $product = (new ProductRepository())->getOne($id);
        } catch (WrongItem $e) {
            echo $this->renderLayout('404.php', ['error' => $e->getMessage()]);
            exit;
        }
        echo $this->renderLayout('card.php', ['product' => $product]);
    }
}
