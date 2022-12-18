<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Role", "Role.name")
                ->sortable(),
            Column::make("Last login", "last_login")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
                Column::make("Action", "id")->format(
                    fn($value, $row, Column $column) => view("admin-page.user-management.buttons")->withValue($value)
                ),
        ];
    }
}
