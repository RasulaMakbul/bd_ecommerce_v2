<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ColorRequest;
use App\Models\Admin\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        //
    }
    public function store(ColorRequest $request)
    {
        // dd($request->images);

        $fileName = $this->uploadImage($request->File('image'));

        $requestData = [

            'name' => $request->name,
            'product_id' => $request->product_id,
            'code' => $request->code,
            'stock' => $request->stock,

            'image' => $fileName
        ];
        // $category->product()->create($requestData);
        Color::create($requestData);
        return redirect()->back()->with('message', 'Color created!');
    }

    public function show(Color $color)
    {
        return view('admin.color.show', compact('color'));
    }

    public function update(Color $color, ColorRequest $request)
    {

        $fileName = $this->uploadImage($request->File('image'));

        $requestData = [

            'name' => $request->name,
            'product_id' => $request->product_id,
            'code' => $request->code,
            'stock' => $request->stock,

            'images' => $fileName,
        ];
        $color->update($requestData);
        return redirect()->back()->with('message', 'Color Updated!');
    }

    public function delete(Color $color)
    {
        $color->delete();
        return redirect()->back()->with('message', 'Deleted!');
    }

    public function uploadImage($image)
    {

        $originalName = $image->getClientOriginalName();
        $fileName = date('Y-m-d') . time() . $originalName;
        $image->move(storage_path('/app/public/colors'), $fileName);
        return $fileName;
    }
}
