<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use WireUi\Traits\Actions;

class AdminTable extends DataTableComponent
{
    protected $model = User::class;

    use Actions;
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setFiltersEnabled();
        $this->setColumnSelectEnabled();
        
    }

    public function deleteId($id){
        $this->deleteId = $id;
    }

    public function processDelete($id){
        User::where("id", $id)->delete();
        $this->emit("adminMsg", "Admin has been deleted");
    }

    public function adminUpdated(){
        $this->emit("adminMsg", "Admin has been updated");
        
    }

  
    public function builder(): Builder
    {
        return User::query()->where("role_id", "2")->select("*"); 
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Email", "email")->searchable()
                ->sortable(),
            Column::make("Role", "role.role")
                ->sortable(),
            Column::make("Phone", "phoneNumber")->searchable()
                ->sortable(),
            Column::make("Last login", "last_login")
                ->sortable(),
                Column::make("Action", "id")->format(
                    fn($value, $row, Column $column) => view("admin-page.admin-management.buttons")->withValue($value)
                ),
        ];
    }
    public function openAdminEditModal($id){
        $this->emit("AdminModal.openAdminEditModal", $id);
    }
}
