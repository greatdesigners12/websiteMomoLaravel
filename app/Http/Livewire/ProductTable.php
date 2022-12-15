<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\product;

<<<<<<< HEAD

use WireUi\Traits\Actions;

class ProductTable extends DataTableComponent
{
    protected $model = Product::class;
    use Actions;
=======
class productTable extends DataTableComponent
{
    protected $model = product::class;

>>>>>>> origin/database
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchEnabled();
    }

    public function delete($id): void

    {
        

        // use a simple syntax

        $this->dialog()->confirm([

            'title'       => 'Are you Sure?',

            'description' => 'Save the information?',

            'acceptLabel' => 'Yes, save it',

            'method'      => 'save',

            'params'      => $id,

        ]);



        

    }

    public function save($id){
        
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
