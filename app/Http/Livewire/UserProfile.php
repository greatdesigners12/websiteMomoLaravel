<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Validator;


class UserProfile extends Component
{   
    use Actions;
    public $provinces = null;
    public $province;
    public $city;
    public $address;
    public $fullName;
    public $cities = null;
    public $birthDate;
    public $gender = "m";


        

    public function render()
    {
        return view('livewire.user-profile');
    }
}
