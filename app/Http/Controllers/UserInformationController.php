<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInformationController extends Controller
{   

    

    public function setUserPassword(Request $request){
        Validator::extend('current_password', function ($attribute, $value, $parameters, $validator) {
            // retrieve the user model
            $user = Auth::user();
        
            // check if the provided password matches the current password
            return Hash::check($value, $user->password);
        });
        $id = Auth::id();
        $validator = Validator::make($request->all(), [
            'old_password' => ['required', 'current_password'],
            'new_password' => 'required|min:6|confirmed',
            'confirm_password' => 'required',
        ], [
            'old_password.current_password' => 'Kata sandi lama salah',
            'old_password.required'=>'Harap mengisi kata sandi lama',
            'new_password.required' => 'Harap mengisi kata sandi baru',
            'new_password.min' => 'Kata sandi baru minimum 6 angka/huruf.',
            'new_password.confirmed' => 'Konfirmasi kata sandi baru dan kata sandi baru harus sama',
            'confirm_password.required' => 'Harap mengisi kata sandi baru',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            User::where('id',$id)->update([
                'password' => Hash::make($request->password),
                ]);
                return redirect()->back()->with("message", "Password has been updated");
                 
        }
    
    }

       
    
}
