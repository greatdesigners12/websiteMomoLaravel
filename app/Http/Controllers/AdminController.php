<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    static function getAll(){
        return User::role('admin');
    
    }


    static function getuserWithPagination($limit){
        return User::paginate($limit);
    }

    function createadmin(Request $request){
        $rules = ['email' => 'required|unique:users,email|email', 'password' => "required|min:6", "password_confirm" => "required|same:password", 'phonenumber'=>"required"];
        $messages = ["required" => "Input :attribute tidak boleh kosong", "password_confirm.required" => "Input konfirmasi password tidak boleh kosong","unique" => ":attribute sudah ada, silahkan input :attribute yang berbeda" ,"password_confirm.same" => "Input konfirmasi password tidak sama"];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $validated = $validator->validated();
            $token = Str::random(64);
            User::create(['email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2,
            'phoneNumber'=>$request->phonenumber,
            'status' => 1,
            'token' => $token]);
            return redirect()->back()->with("message", "user has been created");
            
        }
    }
    function updatepassword(Request $request){
       
        $rules = ['id'=>"required", 'password' => "required|min:6", "password_confirm" => "required|same:password"];
        $messages = ["required" => "Input :attribute tidak boleh kosong", "password_confirm.required" => "Input konfirmasi password tidak boleh kosong","unique" => ":attribute sudah ada, silahkan input :attribute yang berbeda" ,"password_confirm.same" => "Input konfirmasi password tidak sama"];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $validated = $validator->validated();
            User::where('id',$validated['id'])->update([
            'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with("message", "admin password has been updated");
            
        }
    }
    function updateadmin(Request $request){
        
        $rules = ['id'=>"required",'email' => 'required|email',  'phonenumber'=>"required"];
        $messages = ["required" => "Input :attribute tidak boleh kosong","unique" => ":attribute sudah ada, silahkan input :attribute yang berbeda" ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $validated = $validator->validated();
            $token = Str::random(64);
            User::where('id',$validated['id'])->update(['email' => $request->email,
            'role_id' => 2,
            'phoneNumber'=>$request->phonenumber,
            'token' => $token]);
            return redirect()->back()->with("message", "admin has been updated");
            
        }
    }
    
}
