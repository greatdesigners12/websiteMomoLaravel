<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateProduct extends Component
{
    public $categories;
    public $brands;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $company_id;
    public $stock;
    public $curProduct = null;
    public $product = null;

    public function mount(){
        if($this->product != null){
            $this->category_id = $this->product->category_id;
            $this->company_id = $this->product->company_id;
            $this->description = $this->product->description;
            $this->price = $this->product->price;
        }
    }

    public function render()
    {
    
        return view('livewire.create-product');
    }
}
