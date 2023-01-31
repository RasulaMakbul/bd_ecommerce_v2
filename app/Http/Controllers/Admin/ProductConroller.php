<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;

class ProductConroller extends Controller
{
    public function index()
    {
        $category = Category::all();
        $subcategory = SubCategory::all();
        $products = Product::orderBy('id', 'DESC')->paginate(15);
        return view('admin.products.index', compact('category', 'subcategory', 'products'));
    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();

        return view('admin.products.create', compact('categories', 'subcategories'));
    }
    public function store(ProductRequest $request)
    {
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request['images'] as $image) {
                $originalName = $image->getClientOriginalName();
                $fileName = date('Y-m-d') . time() . $originalName;
                $image_path =  $image->storeAs('image', $fileName, 'public');

                array_push($images, $image_path);
            }
        }
        if (!$request->category_id == null) {
            $category = Category::find($request->category_id);
            $requestData = [

                'name' => $request->name,
                'category_id' => $request->category_id,
                'slug' => Str::slug($request->slug),
                'description' => $request->description,
                'code' => $request->code,
                'shortDefination' => $request->shortDefination,
                'test' => $request->test,
                'result' => $request->result,
                'howToUse' => $request->howToUse,
                'pack' => $request->pack,
                'ingredient' => $request->ingredient,
                'weight' => $request->weight,
                'pao' => $request->pao,
                'origin' => $request->origin,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'status' => $request->status == true ? '1' : '0',
                'trending' => $request->trending == true ? '1' : '0',
                'images' => $images,
            ];
            // $category->product()->create($requestData);
            Product::create($requestData);
        } elseif (!$request->sub_category_id == null) {
            $subcategory = SubCategory::find($request->sub_category_id);
            $requestData = [

                'name' => $request->name,
                'sub_category_id' => $request->sub_category_id,
                'slug' => Str::slug($request->slug),
                'description' => $request->description,
                'code' => $request->code,
                'shortDefination' => $request->shortDefination,
                'test' => $request->test,
                'result' => $request->result,
                'howToUse' => $request->howToUse,
                'pack' => $request->pack,
                'ingredient' => $request->ingredient,
                'weight' => $request->weight,
                'pao' => $request->pao,
                'origin' => $request->origin,
                'meta_title' => $request->meta_title,
                'meta_keyword' => $request->meta_keyword,
                'meta_description' => $request->meta_description,
                'status' => $request->status == true ? '1' : '0',
                'trending' => $request->trending == true ? '1' : '0',
            ];
            // $subcategory->product()->create($requestData);
            Product::create($requestData);
        }



        // dd($requestData);





        // return $product->id;
        return redirect()->route('product.index')->with('message', 'Product created!');
    }

    public function show(Product $product)
    {

        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $category = Category::all();
        $subcategory = SubCategory::all();
        return view('admin.products.edit', compact('product', 'category', 'subcategory'));
    }
    public function update(ProductRequest $request)
    {
        dd($request);
    }



    public function active($id)
    {
        // dd($id);
        $product = Product::find($id);
        $product->status = 0;
        $product->update();
        return back();
    }
    public function inactive($id)
    {
        // dd($id);
        $product = Product::find($id);
        $product->status = 1;
        $product->update();
        return back();
    }



    public function trending($id)
    {
        // dd($id);
        $product = Product::find($id);
        $product->trending = 0;
        $product->update();
        return back();
    }
    public function notTrending($id)
    {
        // dd($id);
        $product = Product::find($id);
        $product->trending = 1;
        $product->update();
        return back();
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('message', 'Deleted Successfully!');
    }
}
