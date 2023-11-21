<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Model\Product;
use App\Model\Category;
use App\Controller\CategoryController;

$data = [
    new Category('Mens', [new Product('Blue Shirt'), new Product('Red T-Shirt')]),
    new Category('Kids', [new Product('Sneakers'), new Product('Toy car')]),
];

// Perform actions using the CategoryController
$categoryController = new CategoryController();
$category = $categoryController->getProductsInCategory($data, 'Mens');
$exists = $categoryController->doesProductExistInCategory($data, 'Mens', 'Blue Shirt');

// Include the Vue.js frontend HTML template
include 'src/View/index.html';
