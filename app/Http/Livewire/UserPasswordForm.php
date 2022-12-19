<?php

namespace App\Http\Livewire;

use App\Models\UserInformation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use WireUi\Traits\Actions;

class UserPasswordForm extends Component
{   

    public function render()
    {
        return view('livewire.user-password-form');
    }
}