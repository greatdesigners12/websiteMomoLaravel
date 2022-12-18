<?php

namespace App\Http\Livewire;

use App\Models\UserInformation;
use App\Models\UserOtp;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;
use WireUi\Traits\Actions;

class KodeOtpVerification extends Component
{
    use Actions;
    public $timerVisible = true;
    public $currentTimeNow;
    public $token;
    public $currentMinutes = 10;
    public $currentSeconds = 0;
    public $display = true;
    protected $listeners = ["verifyOtp", "errorMessage"];
    
    public function mount(){
        $this->checker();
    }

    public function checker(){
        if(Auth::check()){
            $user = UserOtp::where("user_id", Auth::id())->where("token", $this->token)->first();
            if($user == null){
                $this->display = false;
            }else{
                $endTime = Carbon::parse($user->date_otp_created)->addMinute(10);
                if (Carbon::now()->gte($endTime)) {
                    $this->display = false;
                   
                }else{
                    $this->currentMinutes = $endTime->diffInMinutes(Carbon::now());
                    $this->currentSeconds = $endTime->diffInSeconds(Carbon::now()) - (($this->currentMinutes) * 60);
                    
                }
            }
        }
    }

    public function verifyOtp($otp){
        $user = UserOtp::where("user_id", Auth::id())->where("token", $this->token)->first();
            if($user == null){
                $this->display = false;
            }else{
                $checkOtp = UserOtp::where("user_id", Auth::id())->where("token", $this->token)->where("kode_otp", $otp)->first();
                
                if($checkOtp != null){
                    UserInformation::where("user_id", Auth::id())->update(["is_phone_verified" => 1]);
                    UserOtp::where("user_id", Auth::id())->where("token", $this->token)->delete();
                    $this->timerVisible = false;
                    $this->successMessage();
                }else{
                    $this->timerVisible = false;
                    $this->emitSelf("errorMessage", "Error OTP Code");
                }
                
            }
    }

    public function redirectTo(){
        return redirect()->route("home");
    }

    public function successMessage(){
        if($this->timerVisible == true){
            $this->timerVisible = false;
        }
        $this->dialog([
            'title'=> 'Success',
            'description'=>'Your phone number has been verified',
            'icon'=> 'success',
            'close'=> [
                'label' => 'Ok',
                
                'method' => 'redirectTo'
            ],
            'onClose' => [

                'method' => 'redirectTo',

                

            ],
           
            
        ]);
    }

    public function errorMessage($message){
        if($this->timerVisible == true){
            $this->timerVisible = false;
        }
        $this->dialog()->confirm([

            'title'       => 'Error',
            'icon'        => 'error',

            'accept'      => [

                'label'  => 'Ok',

                'method' => 'clickErrorDialog',

           

            ],
            'closeButton ' => false,

            'reject' => [

                'label'  => 'close',

                'method' => 'clickErrorDialog',

            ],
            'onDismiss' => [

                'method' => 'clickErrorDialog',

                

            ],
            'onClose' => [

                'method' => 'clickErrorDialog',

                

            ],

            'description' => $message,

            


        ]);
    }

    public function clickErrorDialog(){
        $this->checker();
        $this->timerVisible = true;
    }

    public function countdown(){
        if($this->currentMinutes != -1){
            if($this->currentSeconds == 0){
                $this->currentMinutes--;
                $this->currentSeconds = 59;
            }
            $this->currentSeconds--;
        }else{
            return redirect()->route("toLoginPage")->with(["error" => "Phone number verification failed, please try again"]);
        }
        

    }

    

    public function render()
    {
        return view('livewire.kode-otp-verification');
    }
}
