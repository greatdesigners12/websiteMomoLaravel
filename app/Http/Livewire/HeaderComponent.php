<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Cart;

class HeaderComponent extends Component
{
    public $cartCounter;
    protected $listeners = ["updateCartCounter"];

    public function mount(){
        $this->cartCounter = Cart::where("user_id", Auth::id())->count();
    }

    public function updateCartCounter(){
        $this->cartCounter = Cart::where("user_id", Auth::id())->count();
    }
    public function render()
    {
        return view('livewire.header-component');
    }
}
