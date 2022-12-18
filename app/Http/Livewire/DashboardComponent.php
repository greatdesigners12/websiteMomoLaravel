<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\TransactionGroup;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;

class DashboardComponent extends Component
{

    public $chart;
    public $userCount;
    public $totalUserActive;
    public $revenueThisMonth;
    public $totalProduct;

    public function mount(){
        $this->userCount = User::select("*")->count();
        $this->totalUserActive = User::where('last_login', '>=', Carbon::today())->count();
        $this->revenueThisMonth = TransactionGroup::whereMonth("date_transaction", Carbon::now()->month)->sum("total_price");
        $this->totalProduct = Product::select("*")->count();
    }

    public function render()
    {
        
        return view('livewire.dashboard-component');
    }
}
