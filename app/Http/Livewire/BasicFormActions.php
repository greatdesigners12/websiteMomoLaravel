<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class BasicFormActions extends Component
{
    public $curId;
    public $categories;
    public $brands;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $company_id;
    public $stock;
    public $simpleModal;

    protected $listeners = ['setId'];

    public function mount(){
        $this->categories = Category::all();
        $this->brands = Brand::all();
        
    }

    public function setId($id){
        $this->simpleModal = true;
        $product = Product::find($id);
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->category_id = $product->category_id;
        $this->company_id = $product->company_id;
        $this->stock = $product->stock;
    }

    public function render()
    {
        
        return view('livewire.basic-form-actions');
    }
}
