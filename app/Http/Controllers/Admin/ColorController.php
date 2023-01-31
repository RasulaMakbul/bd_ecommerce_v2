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

        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request['images'] as $image) {
                $originalName = $image->getClientOriginalName();
                $fileName = date('Y-m-d') . time() . $originalName;
                $image_path =  $image->storeAs('image', $fileName, 'public');

                array_push($images, $image_path);
            }
        }

        $requestData = [

            'name' => $request->name,
            'product_id' => $request->product_id,
            'code' => $request->code,
            'costing' => $request->costing,
            'unitPrice' => $request->unitPrice,
            'stock' => $request->stock,

            'images' => $images,
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

        $images = [];

        if ($request->hasFile('images')) {
            foreach ($request['images'] as $image) {
                $originalName = $image->getClientOriginalName();
                $fileName = date('Y-m-d') . time() . $originalName;
                $image_path =  $image->storeAs('image', $fileName, 'public');

                array_push($images, $image_path);
            }
        }

        $requestData = [

            'name' => $request->name,
            'product_id' => $request->product_id,
            'code' => $request->code,
            'costing' => $request->costing,
            'unitPrice' => $request->unitPrice,
            'stock' => $request->stock,

            'images' => $images,
        ];
        $color->update($requestData);
        return redirect()->back()->with('message', 'Color Updated!');
    }

    public function delete(Color $color)
    {
        $color->delete();
        return redirect()->back()->with('message', 'Deleted!');
    }
}
