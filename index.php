<?php
require_once __DIR__ . '/../../vendor/autoload.php';

class Product {
    public string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }
}

class Category {
    public string $name;
    public array $products;

    public function __construct(string $name, array $products) {
        $this->name = $name;
        $this->products = $products;
    }
}

$data = [
    new Category('Mens', [new Product('Blue Shirt'), new Product('Red T-Shirt')]),
    new Category('Kids', [new Product('Sneakers'), new Product('Toy car')]),
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Category Display with Vue.js</title>
</head>
<body>
    <div id="app">
        <h1>Product Categories</h1>

        <div v-for="category in categories" :key="category.name">
            <h2>{{ category.name }}</h2>
            <ul>
                <li v-for="product in category.products" :key="product.name">{{ product.name }}</li>
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                categories: <?= json_encode($data); ?>
            }
        });
    </script>
</body>
</html>
