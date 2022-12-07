<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;

class ProductTable extends DataTableComponent
{
    protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchEnabled();
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")->searchable()
                ->sortable(),
            Column::make("Category id", "category_id")
                ->sortable(),
            Column::make("Company id", "company_id")
                ->sortable(),
            Column::make("Price", "price")
                ->sortable(),
            Column::make("Stock", "stock")
                ->sortable(),
            Column::make("Image product", "image_product")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
          
        ];
    }
}
