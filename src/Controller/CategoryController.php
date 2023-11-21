<?php

namespace App\Controller;

use App\Model\Category;

class CategoryController {
    public static function getProductsInCategory(array $data, string $category): ?Category {
        foreach ($data as $categoryObject) {
            if ($categoryObject->name === $category) {
                return $categoryObject;
            }
        }

        return null;
    }

    public static function doesProductExistInCategory(array $data, string $category, string $product): bool {
        foreach ($data as $categoryObject) {
            if ($categoryObject->name === $category) {
                foreach ($categoryObject->products as $productObject) {
                    if ($productObject->name === $product) {
                        return true;
                    }
                }
            }
        }

        return false;
    }
}
