<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Category;
use WireUi\Traits\Actions;

class CategoryTable extends DataTableComponent
{
    protected $model = Category::class;
    protected $listeners = ["categoryUpdated"];
    use Actions;
    public function configure(): void
    {
        $this->setPrimaryKey('id');

    }

    public function deleteCategory($id){
        $this->dialog()->confirm([

            'title'       => 'Are you Sure?',

            'description' => 'Do you really want to delete this product ?',
            
            'icon'        => 'question',

            'acceptLabel' => 'Delete',

            'method'      => 'processDelete',

            'params'      => $id,

        ]);
    }

    public function processDelete($id){
        Category::where("id", $id)->delete();
        $this->emit("categoryMsg", "The category has been deleted");
    }

    public function categoryUpdated(){
       
        
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")->searchable()
                ->sortable(),
            Column::make("Category", "category")->searchable()
                ->sortable(),
            Column::make("Action", "id")->format(
                fn($value, $row, Column $column) => view("admin-page.category-management.buttons")->withValue($value)
            )
        ];
    }

    public function openEditModal($id){
        $this->emit("openCategoryEditModal", $id);
    }
}
