<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Brand;

class BrandTable extends DataTableComponent
{
    protected $model = Brand::class;

    protected $listeners = ["brandsUpdated"];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }
    public function openEditModal($id){
       
        $this->emit("openBrandEditModal", $id);
    }

    public function brandsUpdated(){
        
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()->searchable(),
            Column::make("Name", "name")
                ->sortable()->searchable(),
            Column::make("Action", "id")->format(
                fn($value, $row, Column $column) => view("admin-page.brand-management.buttons")->withValue($value)
            )
            
        ];
    }
}
