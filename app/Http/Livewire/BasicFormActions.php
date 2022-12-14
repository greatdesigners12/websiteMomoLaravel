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
    public $brand_id;
    public $stock;
    public $simpleModal;

    protected $listeners = ['setId'];

    public function mount(){
        $this->categories = Category::all();
        $this->brands = Brand::all();
        
    }

    public function setId($id){
        $this->simpleModal = true;
        $product = product::find($id);
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->category_id = $product->category_id;
        $this->brand_id = $product->brand_id;
        $this->stock = $product->stock;
    }

    public function render()
    {
        
        return view('livewire.basic-form-actions');
    }
}
