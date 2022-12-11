<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\product;

class productTable extends DataTableComponent
{
    protected $model = product::class;

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
            Column::make("Category", "Category.name")
                ->sortable(),
            Column::make("Brand", "Brand.name")
                ->sortable(),
            Column::make("Price", "price")
                ->sortable(),
            Column::make("Stock", "stock")
                ->sortable(),
            Column::make("Image product", "image_product")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable(),
            Column::make("Action", "id")->format(
                fn($value, $row, Column $column) => view("admin-page.buttons")->withValue($value)
            ),
          
        ];
    }
}
