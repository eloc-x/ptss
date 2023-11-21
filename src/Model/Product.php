<?php

namespace App\Model;

class Product {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }
}
