<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryManagement extends Component
{
    public $editModal = false;
    public $curId;
    public $name;
    protected $listeners = ["openCategoryEditModal", "categoryMsg"];


    public function openCategoryEditModal(Category $category){
        $this->editModal = true;
        $this->curId = $category->id;
        $this->name = $category->category;
    }
    public function render()
    {
        return view('livewire.category-management');
    }

    public function updateCategory(){
        Category::where("id", $this->curId)->update(["category" => $this->name]);
        $this->editModal = false;
        
        $this->emit('categoryUpdated');
    }
    public function categoryMsg($msg){
        session()->flash('message', $msg);
    }
}
