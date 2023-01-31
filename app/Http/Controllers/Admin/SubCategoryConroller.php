<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubcategoryRequest;
use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SubCategoryConroller extends Controller
{
    public function store(SubcategoryRequest $request)
    {
        $fileName = $this->uploadImage($request->File('image'));
        $requestData = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'status' => $request->status == true ? '1' : '0',
            'image' => $fileName
        ];
        SubCategory::create($requestData);
        return redirect()->back()->with('message', 'SubCategory created!');
    }


    public function edit(SubCategory $subcategory)
    {
        $category = Category::all();
        return view('admin.subcategory.edit', compact('category', 'subcategory'));
    }


    public function update(SubCategory $subcategory, SubcategoryRequest $request)
    {
        // dd($request->id);
        $requestData = [
            'name' => $request->name,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'status' => $request->status == true ? '1' : '0'
        ];

        if ($request->hasFile('image')) {
            $path = '/app/public/subcategory' . $subcategory->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $requestData['image'] = $this->uploadImage($request->file('image'));
        }

        $subcategory->update($requestData);
        return redirect()->route('subcategory')->with('message', 'Subcategory Updated!');
    }



    public function show(SubCategory $subcategory)
    {
        return view('admin.subcategory.show', compact('subcategory'));
    }


    public function delete(SubCategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->back()->with('message', 'Deleted!');
    }


    public function uploadImage($image)
    {

        $originalName = $image->getClientOriginalName();
        $fileName = date('Y-m-d') . time() . $originalName;
        $image->move(storage_path('/app/public/subcategory'), $fileName);
        return $fileName;
    }


    public function active($id)
    {
        // dd($id);
        $subcategory = SubCategory::find($id);
        $subcategory->status = 0;
        $subcategory->update();
        return back();
    }
    public function inactive($id)
    {
        // dd($id);
        $subcategory = SubCategory::find($id);
        $subcategory->status = 1;
        $subcategory->update();
        return back();
    }
}
