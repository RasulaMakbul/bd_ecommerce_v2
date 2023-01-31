<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(15);
        $subcategories = SubCategory::orderBy('id', 'DESC')->paginate(15);
        $products = Product::orderBy('id', 'DESC')->paginate(15);
        return view('admin.dashboard', compact('categories', 'subcategories', 'products'));
    }
}
