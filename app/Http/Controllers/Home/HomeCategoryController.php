<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeCategoryController extends Controller
{
    public function show(Request $request,Category $category)
    {
        $attributes=$category->attributes()->where('is_filter',1)->with('values')->get();
        $variation=$category->attributes()->where('is_variation',1)->with('variationValues')->first();
        $categoryBrands= $category->products()->where('is_active',1)->with('brand')->get();
        $products=$category->products()->filter()->search()->paginate(12);
//        dd($categoryBrands);
        return view('home.categories.show',compact('category','attributes','variation',
            'categoryBrands','products'));
    }
}
