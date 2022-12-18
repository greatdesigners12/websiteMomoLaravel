<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    static function getAllusers(){
        return User::all('');
    
    }
    static function getAllcustomer(){
        return User::role('customer');
    
    }
    static function getAlladmin(){
        return User::role('admin');
    
    }


    static function getproductWithPagination($limit){
        return User::paginate($limit);
    }

    function createuser(Request $request){
        $rules = ['email' => 'required|unique:users,email|email', 'password' => "required|min:6"];
        $messages = ["required" => "Input :attribute tidak boleh kosong", "password_confirm.required" => "Input konfirmasi password tidak boleh kosong","unique" => ":attribute sudah ada, silahkan input :attribute yang berbeda" ,"password_confirm.same" => "Input konfirmasi password tidak sama"];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $validated = $validator->validated();
            $token = Str::random(64);
            User::create(['email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'is_verified' =>$request->input('is_verified','1'),
            'token' => $token]);
            return redirect()->back()->with("message", "user has been created");
            
        }
    }
    
}
