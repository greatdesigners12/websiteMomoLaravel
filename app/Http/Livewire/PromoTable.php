<?php

namespace App\Http\Livewire;

use App\Models\Promo;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class PromoTable extends DataTableComponent
{
    protected $model = Promo::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Code", "code")
                ->sortable(),
            Column::make("Diskon Persentase Harga", "percentage")
                ->sortable(),
                Column::make("Diskon Maksimum", "max_discount")
                ->sortable(),
            BooleanColumn::make('Status'),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
                Column::make("Action", "id")->format(
                    fn($value, $row, Column $column) => view("admin-page.admin-promo.buttons")->withValue($value)
                ),
        ];
    }
}
