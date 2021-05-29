<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $topSliders = Banner::where('type', 'top-slider')->where('is_active', 1)->orderBy('priority')->get();
        $fixSliders = Banner::where('type', 'fix-header')->where('is_active', 1)->orderBy('priority')->get();
        $sidebarTopSliders = Banner::where('type', 'sidebar-top-slider')->where('is_active', 1)->orderBy('priority')->get();
        $sidebarBottomBanners = Banner::where('type', 'sidebar-bottom-slider')->where('is_active', 1)->orderBy('priority')->get();
        $indexTopBanners=Banner::where('type', 'index-top')->where('is_active', 1)->orderBy('priority')->get();
        $indexMiddleBanners=Banner::where('type', 'index-middle')->where('is_active', 1)->orderBy('priority')->get();
        $indexBottomBanners=Banner::where('type', 'index-bottom')->where('is_active', 1)->orderBy('priority')->get();
        $brandBanners=Banner::where('type', 'brand-banners')->where('is_active', 1)->orderBy('priority')->get();
        $products=Product::where('is_active',1)->get();
        $mobileProducts = Category::where('name','موبایل')->with('products')->get();
        $computerProducts=Category::where('name','کامپیوتر و تجهیزات جانبی')->with('products')->get();
        $bookProducts=Category::where('name','کودکان')->with('products')->get();
        $handmadeProducts=Category::where('name','محصولات دست ساز')->with('products')->get();
        $homeAppliancesProducts=Category::where('name','لوازم برقی خانگی')->with('products')->get();
//        dd($homeAppliancesProducts);
        return view('home.index',compact('topSliders','products','fixSliders', 'indexTopBanners',
            'sidebarTopSliders', 'sidebarBottomBanners','indexMiddleBanners','indexBottomBanners','brandBanners',
            'mobileProducts','computerProducts','bookProducts','handmadeProducts','homeAppliancesProducts'));
    }
}
