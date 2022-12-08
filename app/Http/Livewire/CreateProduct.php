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

    public function render()
    {
    
        return view('livewire.create-product');
    }
}
