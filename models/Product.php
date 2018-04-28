<?php

namespace app\models;

class Product extends Model
{

    public $id;
    public $title;
    public $publisher_id;
    public $category_id;
    public $price;
    public $author_id;
    public $description;
    public $picture_small_url;
    public $picture_url;

    public function __construct($id = null, $title = null, $publisher_id = null, $category_id = null, $price = null, $author_id = null, $description = null, $picture_small_url = null, $picture_url = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->title = $title;
        $this->publisher_id = $publisher_id;
        $this->category_id = $category_id;
        $this->price = $price;
        $this->author_id = $author_id;
        $this->description = $description;
        $this->picture_small_url = $picture_small_url;
        $this->picture_url = $picture_url;
    }

    public static function getTableName()
    {
        return 'product';
    }
}