<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryManagement extends Component
{
    public $editModal = false;
    public $curId;
    public $name;
    public $method;
    protected $listeners = ["openCategoryEditModal", "categoryMsg"];

    public function openCategoryCreateModal(){
        $this->editModal = true;
        $this->method = "create";
   
    }

    public function openCategoryEditModal(Category $category){
        $this->editModal = true;
        $this->curId = $category->id;
        $this->method = "edit";
        $this->name = $category->category;
    }
    public function render()
    {
        return view('livewire.category-management');
    }

    public function updateCategory(){
        if($this->method == "edit"){
            Category::where("id", $this->curId)->update(["category" => $this->name]);
            $this->categoryMsg("The category has been updated");
            
        }else{
            Category::create(["category" => $this->name]);
            session()->flash('message', "The category has been created");

        }
        $this->editModal = false;
        
        $this->emit('categoryUpdated');
    }
    public function categoryMsg($msg){
        session()->flash('message', $msg);
    }
}
