<?php

namespace App\Model;

class Category {
    public $name;
    public $products;

    public function __construct($name, $products) {
        $this->name = $name;
        $this->products = $products;
    }
}
