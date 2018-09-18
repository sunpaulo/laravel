<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;
use App\Models\Category;

class CreateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            Product::COL_NAME => 'required|string|min:3|max:100',
            Product::COL_PRICE => 'nullable|numeric|min:0',
            'categories.*' => 'nullable|integer|exists:' . Category::TAB_NAME . ',id'
        ];
    }
}