<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Cart;

class HeaderComponent extends Component
{
    public $cartCounter = 0;
    protected $listeners = ["updateCartCounter"];
    public $announcement;

    public function mount(){
        if(Auth::id() != null){
            $this->cartCounter = Cart::where("user_id", Auth::id())->count();
        }

        $data = Announcement::where("status", 1)->first();
        
        if($data != null){
            $this->announcement = $data->content;
        }else{
            $this->announcement = "Salah satu toko accessoris terbaik di banyuwangi";
        }
        
        
    }

    public function updateCartCounter(){
        $this->cartCounter = Cart::where("user_id", Auth::id())->count();
    }
    public function render()
    {
        return view('livewire.header-component');
    }
}
