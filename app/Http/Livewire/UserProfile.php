<?php

namespace App\Http\Livewire;

use App\Models\UserInformation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use WireUi\Traits\Actions;

class UserProfile extends Component
{
    use Actions;
    public $provinces = null;
    public $province_id;
    public $province;
    public $city_id;
    public $address;
    public $fullName;
    public $cities = null;
    public $birthDate;
    public $cityname;
    public $provincename;
    public $gender = "m";

    

    public function mount(){
        $info = UserInformation::where("user_id", Auth::id())->first();
        $provinces = Http::get('https://api.rajaongkir.com/starter/province', [
            'key' => '86abbd5e931a2d5d6d0cca75316477c7',
            
        ]);
        $cityname = Http::get('https://api.rajaongkir.com/starter/city', [
            'key' => '86abbd5e931a2d5d6d0cca75316477c7',
            'id' =>$info->city_id
            
        ]);
        $provincename = Http::get('https://api.rajaongkir.com/starter/province', [
            'key' => '86abbd5e931a2d5d6d0cca75316477c7',
            'id' =>$info->province_id
        ]);
        $this->provincename=$provincename->collect('rajaongkir')["results"]["province"]; 
        $this->cityname=$cityname->collect('rajaongkir')["results"]["city_name"];
        if(($info->birth_date)!=null){
            $this->birthDate = $info->birth_date;
        }
        if(($info->province_id)!=null){
            $this->province_id = $info->province_id;
        }
        if(($info->city_id)!=null){
            $this->city_id = $info->city_id;
        }
        if(($info->full_name)!=null){
            $this->fullName = $info->full_name;
        }
        if(($info->gender)!=null){
            $this->gender = $info->gender;
        }
        if(($info->address)!=null){
            $this->address = $info->address;
        }
       
       
       
        
        
        
        
        $this->provinces = $provinces->collect("rajaongkir")["results"];
        
        
        
        
    }

    public function setUserInformation(){
       
       
        UserInformation::where("user_id", Auth::id())->update(["full_name" => $this->fullName, "birth_date" => $this->birthDate, "gender" => $this->gender, "address" => $this->address,
         "city_id" => $this->city_id, "province_id" => $this->province]);
        
        $this->dialog([

            'title'       => 'User Information saved!',

            'description' => 'Your user information was successfully saved',

            'icon'        => 'success',

            'onClose' => [

                'method' => 'redirectToProfile',

                

            ],

        ]);
            
         
    }
    public function redirectToProfile(){
        return redirect()->route("toProfilePage");
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
        return view('livewire.user-profile');
    }
}
