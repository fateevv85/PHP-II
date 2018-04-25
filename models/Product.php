<?php

namespace app\models;

class Product extends Model
{
    private static $columns = [
        'title',
        'publisher_id',
        'category_id',
        'price',
        'author_id',
        'description',
        'picture_small_url',
        'picture_url'
    ];

    public function getTableName()
    {
        return 'product';
    }
}