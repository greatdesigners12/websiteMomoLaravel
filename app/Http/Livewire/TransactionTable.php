<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\TransactionGroup;

class TransactionTable extends DataTableComponent
{
    protected $model = TransactionGroup::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        
        return [
            
            Column::make("Invoice", "invoice")
                ->sortable(),
            Column::make("Total price", "total_price")
                ->sortable(),
            Column::make("Date transaction", "date_transaction")
                ->sortable(),
            Column::make("User id", "user_id")
                ->sortable(),
            Column::make("Shipping price", "shipping_price")
                ->sortable(),
            Column::make("Status", "status")
                ->sortable(),
            Column::make('Action', 'id')->view('admin-page.transaction-management.buttons'),
        
          
        ];
    }

    public function openUpdateResiModal($id){
        $this->emit("openUpdateResiModal", $id);
    }
}
