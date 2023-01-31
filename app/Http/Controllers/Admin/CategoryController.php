<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
    public function store(CategoryRequest $request)
    {
        $fileName = $this->uploadImage($request->File('image'));
        $requestData = [
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'status' => $request->status == true ? '1' : '0',
            'image' => $fileName
        ];
        Category::create($requestData);
        return redirect()->back()->with('message', 'Category created!');
    }


    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Category $category, CategoryRequest $request)
    {
        // dd($request->id);
        $requestData = [
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'status' => $request->status == true ? '1' : '0'
        ];

        if ($request->hasFile('image')) {
            $path = '/app/public/category' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $requestData['image'] = $this->uploadImage($request->file('image'));
        }

        $category->update($requestData);
        return redirect()->route('category.index')->with('message', 'Category Updated!');
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }
    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('message', 'Deleted!');
    }


    public function uploadImage($image)
    {

        $originalName = $image->getClientOriginalName();
        $fileName = date('Y-m-d') . time() . $originalName;
        $image->move(storage_path('/app/public/category'), $fileName);
        return $fileName;
    }


    public function active($id)
    {
        // dd($id);
        $category = Category::find($id);
        $category->status = 0;
        $category->update();
        return back();
    }
    public function inactive($id)
    {
        // dd($id);
        $category = Category::find($id);
        $category->status = 1;
        $category->update();
        return back();
    }
}
