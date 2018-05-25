<?php
/**
 * Created by PhpStorm.
 * User: Василий
 * Date: 14.05.2018
 * Time: 17:54
 */

namespace app\services;


class Sessions
{
    public function __construct()
    {
        session_start();
    }

    public function get($key)
    {
        return $_SESSION[$key];
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function add($key, $value)
    {
        $_SESSION[$key][] = $value;
    }

    public function deleteAll()
    {
        unset($_SESSION['cart']);
    }

    public function delete($key)
    {
        $value = array_search($key, $_SESSION['cart']);
        unset($_SESSION['cart'][$value]);
    }

    public function destroy()
    {
        session_destroy();
    }

}
