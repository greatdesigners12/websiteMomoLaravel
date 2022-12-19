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
        $userId = Auth::id();
        $rules = ['old_password'=>"required",'password' => "required|min:6", "password_confirm" => "required|same:password"];
        $messages = ["required" => "Input :attribute tidak boleh kosong", "password_confirm.required" => "Input konfirmasi password tidak boleh kosong","unique" => ":attribute sudah ada, silahkan input :attribute yang berbeda" ,"password_confirm.same" => "Input konfirmasi password tidak sama"];
        $validator = Validator::make($request->all(),[
            'old_password' => [
                'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Old Password didn\'t match');
                    }
                },
            ],
        ], $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $validated = $validator->validated();
           
                User::where('userId')->update([
                    'password' => Hash::make($request->password),
                    ]);
                    return redirect()->back()->with("message", "password has been updated");
                     

            }
        }
}
