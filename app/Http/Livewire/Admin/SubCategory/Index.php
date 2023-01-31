<?php

namespace App\Http\Livewire\Admin\SubCategory;

use App\Models\Admin\Category;
use App\Models\Admin\SubCategory;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $subcategory_id;

    public function deleteSubCategory($subcategory_id)
    {
        $this->$subcategory_id = $subcategory_id;
    }
    public function destroySubCategory()
    {
        $subcategory = SubCategory::find($this->subcategory_id);
        $path = '/app/public/subcategory' . $subcategory->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $subcategory = json_decode(json_encode($subcategory), true);
        $subcategory->delete();
        session()->flash('message', 'subcategory Deleted');
    }
    public function render()
    {

        $category = Category::all();
        $subcategory = SubCategory::orderBy('id', 'DESC')->paginate(15);
        return view('livewire.admin.sub-category.index', compact('category', 'subcategory'))->extends('layouts.admin')->section('content');
    }
}
