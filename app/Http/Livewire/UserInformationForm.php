<?php

namespace App\Http\Livewire;

use App\Models\UserInformation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use WireUi\Traits\Actions;

class UserInformationForm extends Component
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

    protected $rules = [
        'fullName' => 'required',
        'city' => 'required|integer',
        'birthDate' => 'required',
        
        'province' => 'required',
        'address' => 'required'
    ];

    public function mount(){
        $provinces = Http::get('https://api.rajaongkir.com/starter/province', [
            'key' => '86abbd5e931a2d5d6d0cca75316477c7',
            
        ]);

       
        
        $this->provinces = $provinces->collect("rajaongkir")["results"];
        
        
        
    }
    public function setUserInformation(){
       
        $this->validate();
        UserInformation::where("user_id", Auth::id())->update(["full_name" => $this->fullName, "birth_date" => $this->birthDate, "gender" => $this->gender, "address" => $this->address,
         "city_id" => $this->city, "province_id" => $this->province]);

        $this->dialog([

            'title'       => 'User Information saved!',

            'description' => 'Your user information was successfully saved',

            'icon'        => 'success',

            'onClose' => [

                'method' => 'redirectToTransaction',

                

            ],

        ]);
         
    }

    public function redirectToTransaction(){
        return redirect()->route("toHistoryTransactionsPage");
    }

    public function resetCity(){
        $cities = Http::get('https://api.rajaongkir.com/starter/city', [
            'key' => '86abbd5e931a2d5d6d0cca75316477c7',
            'province' => $this->province
        ]);
        $this->cities = $cities->collect("rajaongkir")["results"];
        
    }
    public function render()
    {
        return view('livewire.user-information-form');
    }
}
