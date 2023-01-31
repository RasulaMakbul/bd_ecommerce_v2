<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Admin\Category;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $category_id;

    public function deleteCategory($category_id)
    {
        $this->$category_id = $category_id;
    }
    public function destroyCategory()
    {
        $category = Category::find($this->category_id);
        $path = '/app/public/category' . $category->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $category = json_decode(json_encode($category), true);
        $category->delete();
        session()->flash('message', 'Category Deleted');
    }

    public function render()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(15);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }
}
