<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormContact extends Component
{
    public $subject;
    public $body;
    public $name;
    public function render()
    {
        return view('livewire.form-contact');
    }
}
