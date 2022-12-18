<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateUser extends Component
{
    public $users=null;
    public $roles=null;
  

    public function render()
    {
    
        return view('livewire.user-form');
    }
}
