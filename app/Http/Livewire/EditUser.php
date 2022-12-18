<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Edituser extends Component
{
    public $users;
    public $email;
    public $phoneNumber;


    public function mount(){
        if($this->users != null){
            $this->email = $this->users->email;
            $this->phoneNumber = $this->users->phoneNumber;
        }
    }
    public function render()
    {
        return view('livewire.edit-user');
    }
}
