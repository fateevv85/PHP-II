<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 14.05.2018
 * Time: 23:59
 */

namespace app\base;


class Storage
{
    protected $items = [];

    public function set($key, $object)
    {
        $this->items[$key] = $object;
    }

    public function get($key)
    {
        if (!isset($this->items[$key])) {
            $this->items[$key] = App::call()->createComponent($key);
//            $this->items[$key] = App::call()-;
        }
        return $this->items[$key];
    }
}
