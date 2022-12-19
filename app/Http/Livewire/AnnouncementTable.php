<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use App\Models\Promo;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class AnnouncementTable extends DataTableComponent
{
    protected $model = Announcement::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }
    public function deleteId($id){
        $this->deleteId = $id;
    }
    public function columns(): array
    {
        
        return [
            Column::make("Id", "id")
            ->sortable(),
        Column::make("Content", "content")->searchable()
            ->sortable(),
        BooleanColumn::make('Status'),
        Column::make("Created at", "created_at")
            ->sortable(),
        Column::make("Updated at", "updated_at")
            ->sortable(),
            Column::make("Action", "id")->format(
                fn($value, $row, Column $column) => view("admin-page.admin-announce.buttons")->withValue($value)
            ),
        ];
    }
}
