<?php

use App\Models\Product;

class ProductSeeder extends DatabaseSeeder
{
    public function run()
    {
        factory(Product::class, self::PRODUCT_COUNT)->create();
    }
}
