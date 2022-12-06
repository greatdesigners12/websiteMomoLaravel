<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateProduct extends Component
{
    public $categories;
    public $brands;
    public $curProduct = null;

 

    public function render()
    {
    
        return view('livewire.create-product');
    }
}
