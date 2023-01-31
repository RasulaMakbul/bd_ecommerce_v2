<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->paginate(15);
        return view('admin.slider.index', compact('sliders'));
    }
    public function store(SliderRequest $request)
    {
        $fileName = $this->uploadImage($request->File('image'));
        $requestData = [
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status == true ? '1' : '0',
            'image' => $fileName
        ];
        Slider::create($requestData);
        return redirect()->back()->with('message', 'Slider created!');
    }



    public function uploadImage($image)
    {

        $originalName = $image->getClientOriginalName();
        $fileName = date('Y-m-d') . time() . $originalName;
        $image->move(storage_path('/app/public/slider'), $fileName);
        return $fileName;
    }

    public function active($id)
    {
        // dd($id);
        $slider = Slider::find($id);
        $slider->status = 0;
        $slider->update();
        return back();
    }
    public function inactive($id)
    {
        // dd($id);
        $slider = Slider::find($id);
        $slider->status = 1;
        $slider->update();
        return back();
    }
}
