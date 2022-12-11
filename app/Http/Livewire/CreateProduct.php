<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Createproduct extends Component
{
    public $categories;
    public $brands;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $brand_id;
    public $stock;
    public $curproduct = null;
    public $product = null;

    public function render()
    {
    
        return view('livewire.create-product');
    }
}
