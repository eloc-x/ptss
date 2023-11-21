<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Model\Category;
use App\Model\Product;

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
            <ul v-if="category.products.length > 0">
                <li v-for="product in category.products" :key="product.name">{{ product.name }}</li>
            </ul>
            <p v-else>No products in this category</p>
        </div>

        <div>
            <h2>Add Product to Category</h2>
            <label for="newProductName">Product Name:</label>
            <input type="text" v-model="newProductName" id="newProductName">

            <label for="selectedCategory">Select Category:</label>
            <select v-model="selectedCategory" id="selectedCategory">
                <option v-for="category in categories" :key="category.name" :value="category.name">{{ category.name }}</option>
            </select>

            <button @click="addProduct">Add Product</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                categories: <?= json_encode($data); ?>,
                newProductName: '',
                selectedCategory: '',
            },
            methods: {
                addProduct() {
                    const category = this.categories.find(cat => cat.name === this.selectedCategory);

                    if (category) {
                        category.products.push({ name: this.newProductName });
                        this.newProductName = '';
                    }
                },
            },
        });
    </script>
</body>
</html>
