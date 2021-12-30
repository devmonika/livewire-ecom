<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;

    public function deleteCategory($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        session()->flash('message','Category has been deleted successfully!');
    }

    public function render()
    {
        
        $categories = Category::paginate(10);

        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}