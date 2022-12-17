<?php

namespace App\Http\Livewire;

use App\Models\TransactionGroup;
use Livewire\Component;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TransactionDetail extends Component
{
    public $transactionDetail;
    protected $listeners = ["errorSession"];

    public function pay(){
        
        if($this->transactionDetail->snap_token == "" ){
            $curUser = User::find(Auth::id());
            $midtrans = new CreateSnapTokenService($this->transactionDetail->invoice, $this->transactionDetail->total_price, $this->transactionDetail->relation,  $curUser);
            $snapToken = $midtrans->getSnapToken();
            TransactionGroup::where("invoice", $this->transactionDetail->invoice)->update(["snap_token" => $snapToken]);
            $this->dispatchBrowserEvent('openMidTransPopUp', ['snapToken' => $snapToken]);        
        }else{
            $this->dispatchBrowserEvent('openMidTransPopUp', ['snapToken' => $this->transactionDetail->snap_token]);  
        }
        

    }

    public function resetSnapToken(){
       TransactionGroup::where("id", $this->transactionDetail->id)->update(["snap_token" => ""]);
    }

    public function errorSession(){
        session()->flash('error', 'Jika mengalami kendala ataupun sudah expired');
    }

    public function render()
    {
        return view('livewire.transaction-detail');
    }
}
