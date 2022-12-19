<?php

namespace App\Http\Livewire;

use App\Models\TransactionGroup;
use Livewire\Component;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Http;

class TransactionDetail extends Component
{
    public $transactionDetail;
    public $shippingPrice;
    public $courier;
    public $services = null;
    public $curService;

    protected $listeners = ["errorSession", "paymentSuccess"];

    public function pay(){
        
        if($this->transactionDetail->snap_token == "" ){
            $curUser = User::find(Auth::id());
            $midtrans = new CreateSnapTokenService($this->transactionDetail->invoice, $this->shippingPrice,$this->transactionDetail->total_price, $this->transactionDetail->relation,  $curUser);
            $snapToken = $midtrans->getSnapToken();
            TransactionGroup::where("invoice", $this->transactionDetail->invoice)->update(["snap_token" => $snapToken]);
            $this->dispatchBrowserEvent('openMidTransPopUp', ['snapToken' => $snapToken]);        
        }else{
            $this->dispatchBrowserEvent('openMidTransPopUp', ['snapToken' => $this->transactionDetail->snap_token]);  
        }
        

    }

    public function selectShippingPrice($service){
        foreach($this->services as $curService){
            if($curService["service"] == $service){
                
                $this->shippingPrice = $curService["cost"][0]["value"];
                
                break;
            }
        }
    }

    public function getShippingPrice(){
        $totalWeight = 0;
        foreach($this->transactionDetail->relation as $item){
        
            $totalWeight += $item->transaction_product->weight;
        }
        $userInformation = UserInformation::where("user_id", Auth::id())->first();
        
        $response = Http::post('https://api.rajaongkir.com/starter/cost', [
            'key' => '86abbd5e931a2d5d6d0cca75316477c7',
            'origin' => 42,
            'destination' => $userInformation->city_id,
            'weight' => $totalWeight,
            'courier' => $this->courier
        ]);
        
        
        $this->services = $response->collect("rajaongkir")["results"][0]["costs"];
    }

    public function resetSnapToken(){
       TransactionGroup::where("id", $this->transactionDetail->id)->update(["snap_token" => ""]);
    }

    public function errorSession(){
        session()->flash('error', 'Jika mengalami kendala ataupun sudah expired');
    }

    public function paymentSuccess(){
        UserInformation::where("user_id", Auth::id())->update(["status" => "Terbayar", "snap_token" => ""]);
        return redirect()->route("toHistoryTransactionsPage");
    }

    public function render()
    {
        return view('livewire.transaction-detail');
    }
}
