<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\NumberFilter;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;    
use Carbon\Carbon;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    protected $listeners = ["broadcastWhatsapp"];

    

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setFiltersEnabled();
        $this->setColumnSelectEnabled();
        $this->setBulkActions([
            'exportExcel' => 'Export Excel',
            'openBroadcastContentModal' => 'Broadcast Whatsapp'
        ]);
    }

    public function openBroadcastContentModal(){
        $this->emit("openWhatsappModal");
    }

    public function broadcastWhatsapp($data){
       
        foreach($this->getSelected() as $item)
        {
            
            $user = User::find($item);
            
            $shouldSendMessage = $user->phoneNumber != "";
            if($shouldSendMessage){
                $response = Http::asForm()->post("https://app.ruangwa.id/api/send_message", [
                    'token' => 'H7tZPKvSP13n5CZAUA9TbRD323xJ4dex7968bSQSRwhhdyJt3s',
                    'number' => $user->phoneNumber,
                    "message" => "*" . $data["title"] . "*\n\n" . $data["content"],
                    "date"=> date("Y-m-d"),
                    "time"=> date("H:i:s")
                ]);

                if($response["result"] == "false"){
                    return $this->emit("whatsappBroadcastResponse", ["status" => "error", "message" => "Can't broadcast to all numbers"]);
                }
            }

            $this->emit("whatsappBroadcastResponse", ["status" => "success", "message" => "All whatsapp messages has been sent (Only sent to user who has phone number)"]);
            
            
        }
        
    }

    public function exportExcel()
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
            }),
            NumberFilter::make('Min Age', "user_information")
            ->config([
                'min' => '0',
                'max' => '150',
            ])->filter(function(Builder $builder, string $value) {
               
                $builder->where('tanggal_lahir', "<=", (now()->year - (int)$value) . "-1-1");
               
            }), 
            NumberFilter::make('Max Age')
            ->config([
                'min' => '0',
                'max' => '150',
            ])->filter(function(Builder $builder, string $value) {
               
                $builder->where('tanggal_lahir', ">=", (now()->year - (int)$value) . "-1-1");
               
            }), 
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
            Column::make("Gender", "user_information.gender")->format(
                fn($value, $row, Column $column) => $value != "" ? ($value == "m" ? "male" : "female") : ""
            )->sortable(),
            Column::make("Role", "role.role")
                ->sortable(),
            Column::make('Age', "user_information.tanggal_lahir")->format(
                fn($value, $row, Column $column) => Carbon::parse($value)->age
            ),
            Column::make("Last login", "last_login")
                ->sortable(),
            BooleanColumn::make('Phone Verified','user_information.is_phone_verified'),
            BooleanColumn::make('Email Verified', 'user_information.is_email_verified')
        ];
    }
}
