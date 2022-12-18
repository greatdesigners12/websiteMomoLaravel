<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PromoForm extends Component
{   
    public $promo;


    public function mount(){
        if($this->promo != null){
            $this->code = $this->promo->code;
            $this->percentage = $this->promo->percentage;
            $this->max_discount = $this->promo->max_discount;
            $this->status = $this->promo->status;
        }
    }
    public function render()
    {
        return view('livewire.promo-form');
    }
}
