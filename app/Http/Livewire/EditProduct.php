<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Kategori;
use App\Models\Product;
use LivewireUI\Modal\ModalComponent;

class EditProduct extends ModalComponent 
{
    public $product;
    public $categories;
    public $brands;
    public $productId;

    public function render(Product $product)
    {
        $this->productId = $product;
        
        $this->product = Product::find($product);
       $this->categories = Kategori::all();
       echo '<script language="javascript">';
                            echo 'alert("' . $this->categories .'")';
                            echo '</script>';
       $this->brands = Brand::all();
        return view('livewire.edit-product');
    }
}
