<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class HomeProductsController extends Controller
{
    public function show(Product $product)
    {
        $category = Category::where('is_active', 1)->get();
        return view('home.products.show', compact('product', 'category'));
    }
}
