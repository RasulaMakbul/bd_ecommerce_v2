<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Color;
use App\Models\Admin\Product;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{


    public function index()
    {
        $sliders = Slider::where('status', '1')->get();
        $categories = Category::where('status', '1')->get();
        $trendingProducts = Product::where('trending', '1')->latest()->take(15)->get();
        return View('welcome', compact('sliders', 'categories', 'trendingProducts'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('frontend.collections.category.index', compact('categories'));
    }


    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $products = $category->product()->get();
            // if ($products) {
            //     $colors = $products->color()->get();
            // }


            return view('frontend.collections.products.index', compact('category', 'products'));
        } else {
            return redirect()->back();
        }
    }
    public function newArrival()
    {
        $products = Product::latest()->take(15)->get();
        return view('frontend.collections.products.newProduct', compact('products'));
    }
    public function product(Product $product)
    {
        return view('frontend.collections.products.show', compact('product'));
    }
}
