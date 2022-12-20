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
use App\Models\UserInformation;
use App\Models\UserOtp;
use Illuminate\Support\Facades\Http;    


class AuthController extends Controller
{
    public function verifyUser(Request $request){
      
        UserInformation::where("user_id", $request->id)->update(["token" => "", "is_email_verified" => 1]);
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
         
            
            if(Auth::attemptWhen($credentials, function ($user) {
                return $user->user_information->is_email_verified == 1;
            })){
                $request->session()->regenerate();
                
                $user = User::find(Auth::id());
                $userInfo = UserInformation::where("user_id", Auth::id())->first();
                if($user->role_id == 1){
                    if($userInfo->is_phone_verified == 0){
                        return redirect()->route("toValidatePhoneNumber");
                    }else{
                        return redirect()->route("home");
                    }
                }else{
                    return redirect()->route("toDashboardPage");
                }
                
                
            }
    
            return redirect()->back()->withErrors([
                'error' => 'The provided credentials do not match our records.',
                
            ]);
        }  
    }   

    public function processResetPassword(Request $request){
        $rules = ['password' => "required|min:6", "password_confirm" => "required|same:password"];
        $messages = ["required" => "Input :attribute tidak boleh kosong", "password_confirm.required" => "Input konfirmasi password tidak boleh kosong","unique" => ":attribute sudah ada, silahkan input :attribute yang berbeda" ,"password_confirm.same" => "Input konfirmasi password tidak sama",
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            
            User::where("id", $request->id)->update(["password" => Hash::make($request->password)]);
            UserInformation::where("user_id", $request->id)->update(["token" => ""]);
            
            return redirect()->route("toLoginPage")->with("message", "Password has been reset, you can login with the new password");
            
        }
    }

    public function processPhoneNumber(Request $request){
        $rules = ["phoneNumber" => "required|max_digits:12|numeric"];
        $messages = ["phoneNumber.required" => "Input nomor telepon tidak boleh kosong", "phoneNumber.max" => "Input nomor telepon dengan benar (Max 12 angka)","phoneNumber.integer"  => "Input nomor telepon dengan benar" ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            
            date_default_timezone_set('UTC');
            $time =  date('Y-m-d H:i:s');
            $token = md5($time);
            $kodeOtp = (string)mt_rand(100000, 999999);
            
            $response = Http::asForm()->post("https://app.ruangwa.id/api/send_message", [
                'token' => 'H7tZPKvSP13n5CZAUA9TbRD323xJ4dex7968bSQSRwhhdyJt3s',
                'number' => $request->phoneNumber,
                "message" => "*MOMO ACCESORIS EMAIL VERIFICATION*\n\nHere is your otp code : $kodeOtp",
                "date"=> date("Y-m-d"),
                "time"=> date("H:i:s")
            ]);
            User::where("id", Auth::id())->update(["phoneNumber" => $request->phoneNumber]);
            UserOtp::create(["user_id" => Auth::id(), "kode_otp" => $kodeOtp, "token" => $token, "date_otp_created" => $time]);

          

            

            if($response["result"] == "false"){
                return redirect()->back()->withErrors(["message" => "Whatsapp message failed to sent"]);
            }
            return redirect()->route("toOtpVerificationPage", ["token" => $token])->with(["minutes" => null, "seconds" => null]);
            
        }
    }

    public function processSendResetPasswordEmail(Request $request){
        $rules = ['email' => 'required|email'];
        $messages = ["required" => "Input :attrribute mustn't be empty", "email.email" => "Please input email format correctly" ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{   
            $token = Str::random(64);         
            $user = User::where("email", $request->email)->first();
            if($user != null){
                UserInformation::where("user_id", $user->id)->update(["token" => $token]);
                Mail::to($request->email)->send(new StoreEmailSender("Reset Password", $user->id ,$token));

                return redirect()->back()->with("message", "Reset password link has been sent to your email");
            }else{
                return redirect()->back()->withErrors(["message" =>"Email doesn't exist, plase register first"]);
            }
          
           
           
            
        }
    }


    public function processRegister(Request $request){
        $rules = ['email' => 'required|unique:users,email|email', 'password' => "required|min:6", "password_confirm" => "required|same:password"];
        $messages = ["required" => "Input :attribute tidak boleh kosong", "password_confirm.required" => "Input konfirmasi password tidak boleh kosong","unique" => ":attribute sudah ada, silahkan input :attribute yang berbeda" ,"password_confirm.same" => "Input konfirmasi password tidak sama",
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{   
            $token = Str::random(64);         
            $user = User::create(['email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 1,
            ]);
            $url = $_ENV['SERVER'] . "/emailVerification?" . "id=" . $user->id . "&" . "token=" .$token ;
            UserInformation::create(["user_id" => $user->id, "token" => $token, "is_email_verified" => 0]);
           
           
            Mail::to($request->email)->send(new StoreEmailSender("Email Verification", $user->id ,$token));
  
            return redirect()->route("toLoginPage")->with("message", "Account has been registered, please check your email to verify your account");
        }

       
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    
}
