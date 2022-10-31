<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Brands extends Component
{
    public $brands;
    public function render()
    {
        return view('livewire.brands', ["brands" => $this->brands]);
    }
}
