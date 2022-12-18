<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditAdmin extends Component
{
    public $user;
    public $role;
    public function render()
    {
        return view('livewire.admin-form');
    }
}
