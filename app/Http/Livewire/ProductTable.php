<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;
use Illuminate\Support\Facades\File; 
use WireUi\Traits\Actions;

class ProductTable extends DataTableComponent
{
    protected $model = Product::class;
    use Actions;
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchEnabled();
    }

    public function deletePdct($id): void

    {
        

        // use a simple syntax

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
        $product = Product::where("id", $id);
        $productData = $product->select("image_product")->first();
      
        if (File::exists(public_path('img/momo_product/' . $productData->image_product))) {
            File::delete(public_path('img/momo_product/' . $productData->image_product));
        }
        $product->delete();
        $this->emit('deleteMessage');
        
        
    }


    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")->searchable()
                ->sortable(),
            Column::make("Category", "Category.category")
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
                fn($value, $row, Column $column) => view("admin-page.product-management.buttons")->withValue($value)
            ),
          
        ];
    }
}
