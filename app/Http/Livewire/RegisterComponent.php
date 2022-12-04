<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RegisterComponent extends Component
{
    public $snapToken;

    public function mount($snapToken)

    {

        $this->snapToken = $snapToken;
   
    }

    public function render()
    {
        return view('livewire.register-component');
    }

    public function payNow()
    {
        
       
        
          
          // Redirect to Snap Payment Page
          header('Location: ' . $this->snapToken);
        
    }
}
