<?php

use PHPUnit\Framework\TestCase;
use App\Model\Category;
use App\Model\Product;

class ProductCategoryTest extends TestCase {
    public function testGetProductsInCategory() {
        $category = new Category('Mens', [new Product('Blue Shirt'), new Product('Red T-Shirt')]);
        $this->assertEquals('Blue Shirt', $category->products[0]->name);
    }

    public function testDoesProductExistInCategory() {
        $category = new Category('Mens', [new Product('Blue Shirt'), new Product('Red T-Shirt')]);
        $this->assertTrue($category->products[0]->name === 'Blue Shirt');
        $this->assertFalse($category->products[1]->name === 'NonexistentProduct');
    }
}
