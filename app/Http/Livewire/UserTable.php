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

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setFiltersEnabled();
        $this->setColumnSelectEnabled();
        $this->setBulkActions([
            'exportSelected' => 'Send to whatsapp',
        ]);
    }

    public function exportSelected()
    {
        $users = [];
        foreach($this->getSelected() as $item)
        {
           $user = User::find($item);
           
           array_push($users, $user); 
        }
  
        return Excel::download(new UsersExport($users), 'users.xlsx');

    }

    public function filters(): array
{
    return [
        SelectFilter::make('Phone verified', "is_phone_verified")
            ->options([
                '' => 'All',
                'yes' => 'Yes',
                'no' => 'No',
            ])->filter(function(Builder $builder, string $value) {
                if ($value === 'yes') {
                    $builder->where('is_phone_verified', 1);
                } elseif ($value === 'no') {
                    $builder->where('is_phone_verified', 0);
                }
            }),
            SelectFilter::make('Email verified', "is_email_verified")
            ->options([
                '' => 'All',
                'yes' => 'Yes',
                'no' => 'No',
            ])->filter(function(Builder $builder, string $value) {
                if ($value === 'yes') {
                    $builder->where('is_email_verified', 1);
                } elseif ($value === 'no') {
                    $builder->where('is_email_verified', 0);
                }
            })
    ];
}

    public function builder(): Builder
    {
        return User::query()->where("role", "user")->select("*"); 
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable()->searchable(),
            Column::make("Role", "role")
                ->sortable(),
            Column::make("Last login", "last_login")
                ->sortable(),
            BooleanColumn::make('Phone Verified','is_phone_verified'),
            BooleanColumn::make('Email Verified', 'is_email_verified')
        ];
    }
}
