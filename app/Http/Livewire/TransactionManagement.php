<?php

namespace App\Http\Livewire;

use App\Models\TransactionGroup;
use Livewire\Component;

class TransactionManagement extends Component
{
    public $curId;
    public $updateModal = false;
    public $noResi;

    protected $listeners = ["openUpdateResiModal"];

    function updateNomerResi(){
        TransactionGroup::where("id", $this->curId)->update(["no_resi" => $this->noResi]);
        $this->updateModal = false;
        session()->flash('message', 'No resi has been updated');
    }

    public function openUpdateResiModal($id){
        $transaction = TransactionGroup::find($id);
        $this->curId = $id;
        $this->updateModal = true;
        if($transaction != null){
            $this->noResi = $transaction->no_resi;
        }
        
    }
    public function render()
    {
        return view('livewire.transaction-management');
    }
}
