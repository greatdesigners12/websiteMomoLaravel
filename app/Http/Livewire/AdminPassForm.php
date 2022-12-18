<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminPassForm extends Component
{   
    public $users;
    
    public function render()
    {
        return view('livewire.admin-pass-form');
    }
}
