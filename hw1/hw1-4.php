<?php

class Product
{
    private $name;
    private $description;
    private $properties;
    private $price;

    public function __construct($name, $description = null, $properties, $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->properties = $properties;
        $this->price = $price;
    }

    public function display()
    {
        if (is_array($properties = $this->properties)) {
            $properties = implode(',', $properties);
        }

        return "<h3>{$this->name}</h3>
               {$this->description}
               <br>
               <b>{$properties}</b>
               <br>
               <mark>{$this->price}</mark> rub";
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setProperties($properties)
    {
        $this->properties = $properties;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getName()
    {
        return $this->name;
    }

}

class Mobile extends Product
{
    private $osVersion;

    public function __construct($name, $description = null, $properties, $price, $osVersion)
    {
        parent::__construct($name, $description, $properties, $price);
        $this->osVersion = $osVersion;
    }

    public function display()
    {
        $this->displayOs();
        parent::display();
    }

    private function displayOs()
    {
        echo "<p><i>{$this->osVersion}</i></p>";
    }

    public function setOsVersion($osVersion)
    {
        $this->osVersion = $osVersion;
    }
}

class User
{
    private $name;
    private $login;
    private $password;
    private $email;
    const access = "user";

    public function __construct($name, $login, $password, $email)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
    }

    public function display()
    {
        $role = static::access;
        echo "<h3>{$role}: {$this->name}</h3>
              <p>login:{$this->login}</p>
              email:{$this->email}";
    }

    public function getName() {
        return $this->name;
    }
}

class Admin extends User
{
    const access = "admin";

    public function changeProductName($product, $name)
    {
        $product->setName($name);
    }

    public function changePrice($product, $price)
    {
        $product->setPrice($price);
    }

}

class Order
{
    private $productName;
    private $userName;
    private $count;
    private $discount;
    public static $orderCount;

    public function __construct($product, $user, $count, $discount)
    {
        $this->productName = $product;
        $this->userName = $user;
        $this->count = $count;
        $this->discount = $discount;
    }

    public function displayOrder()
    {
        $price = $this->productName->getPrice();
        $count = $this->count;
        $discount = $this->discount;
        $totalPrice = $count * ($price * (100 - $discount) / 100);
        $this->increaseCount();
        $orderCount = Order::$orderCount;

        echo "<h3>Order N {$orderCount}</h3>
              <hr>
              <p>Item: {$this->productName->getName()}</p>
              <hr>
              <p>User: {$this->userName->getName()}</p>
              <hr>
              <p>Count: {$this->count}</p>
              <p>Discount: {$this->discount}%</p>
              <p>Total price: {$totalPrice}</p>";
    }

    public function increaseCount()
    {
        static::$orderCount++;
    }

}

$samsung = new Mobile('Samsung', 'New phone', ['4Gb RAM', '11Mp'], 11200, 'Android');
$user1 = new User('Sereja', 'serg', 'qwe', 'ser@mail.ru');

$admin = new Admin('Sasha', 'shura', 'admin', 'sasha@mail.ru');
$admin->changeProductName($samsung, 'IPhone');
$admin->changePrice($samsung, '20000');

$order1 = new Order($samsung, $user1, 1, 15);
$order1->displayOrder();
