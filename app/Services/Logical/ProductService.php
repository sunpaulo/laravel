<?php

namespace App\Services\Logical;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductService
{
    public static function createFromRequest(CreateProductRequest $request)
    {
        $product = Product::create($request->all());

        // categories
        if ($request->input('categories')) {
            $product->categories()->attach($request->input('categories'));
        }

        return $product;
    }

    public static function updateFromRequest(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());

        // categories
        $product->categories()->detach();
        if ($request->input('categories')) {
            $product->categories()->attach($request->input('categories'));
        }

        return $product;
    }

    public static function delete(Product $product)
    {
        $product->categories()->detach();
        $product->delete();
    }
}