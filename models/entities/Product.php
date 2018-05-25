<?php

namespace app\models\entities;

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
    public $count = 1;

    public function __construct($id = null, $title = null, $publisher = null, $category = null, $price = null, $author = null, $description = null, $picture_small_url = null, $picture_url = null)
    {
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
