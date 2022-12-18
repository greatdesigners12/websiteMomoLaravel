<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\StoreEmailSender;

class AuthController extends Controller
{
    public function verifyUser(Request $request){
      
        User::where("id", $request->id)->update(["token" => "", "is_verified" => 1]);
        return redirect()->route("toLoginPage")->with("message", "Your account is verified, please login");
    }

    public function login(Request $request){ 
        $rules = ['email' => 'required|email', 'password' => "required|min:6"];
        $messages = ["required" => "Input :attribute tidak boleh kosong", "password.min" => "Jumlah karakter password harus lebih dari 5 karakter"];

        $credentials = Validator::make($request->all(), $rules, $messages);
        
        

        if($credentials->fails()){
            return redirect()->back()->withErrors($credentials);
        }else{
            $credentials = $credentials->validated();
            $credentials['is_verified'] = 1;
            
            if(Auth::attempt($credentials, $request->rememberMe)){
                $request->session()->regenerate();
                return redirect()->back()->with("message", "Login success");
            }
    
            return redirect()->back()->withErrors([
                'error' => 'The provided credentials do not match our records.',
                
            ]);
        }
        
        
    }   

    public function processRegister(Request $request){
        $rules = ['email' => 'required|unique:users,email|email', 'password' => "required|min:6", "password_confirm" => "required|same:password"];
        $messages = ["required" => "Input :attribute tidak boleh kosong", "password_confirm.required" => "Input konfirmasi password tidak boleh kosong","unique" => ":attribute sudah ada, silahkan input :attribute yang berbeda" ,"password_confirm.same" => "Input konfirmasi password tidak sama"];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $token = Str::random(64);
            $user = User::create(['email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',
            'is_verified' => 0,
            'token' => $token]);
            
            
            Mail::to($request->email)->send(new StoreEmailSender("Email Verification", $user->id ,$token));
  
            return redirect()->route("toLoginPage")->with("message", "Account has been registered, please check your email to verify your account");
        }

       
    }

    
}
