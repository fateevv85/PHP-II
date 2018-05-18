<?php

namespace app\models\entities;

use app\base\App;
use app\services\Sessions;

class Product extends DataEntity
{

    public $id;
    public $title;
    public $publisher;
    public $category;
    public $price;
    public $author;
    public $description;
    public $picture_small_url;
    public $picture_url;

    public function __construct($id = null, $title = null, $publisher = null, $category = null, $price = null, $author = null, $description = null, $picture_small_url = null, $picture_url = null)
    {
//        App::call()->session->set("cart.id", 2);
        $this->id = $id;
        $this->title = $title;
        $this->publisher = $publisher;
        $this->category = $category;
        $this->price = $price;
        $this->author = $author;
        $this->description = $description;
        $this->picture_small_url = $picture_small_url;
        $this->picture_url = $picture_url;
    }

    public static function getTableName()
    {
        return 'product';
    }

    public function getShortDesc() {
        return mb_substr($this->description, 50);
    }
}