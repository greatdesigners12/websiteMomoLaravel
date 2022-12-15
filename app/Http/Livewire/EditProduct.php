<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Editproduct extends Component
{
    public $categories;
    public $brands;
    public $product;
    public function render()
    {
        return view('livewire.edit-product');
    }
}
