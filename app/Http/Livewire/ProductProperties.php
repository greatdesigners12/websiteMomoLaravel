<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ProductController;
use Livewire\Component;

class ProductProperties extends Component
{
   
    public $categories;
    public $min;
    public $max;
    public $search;
    public $curCategory;
    public $priceSort;

    public function search(){
        $this->emit("updateProductsWithSearch", $this->search);
    }

    public function mount(){
        $this->curCategory = "semua";
    }

    public function setPriceSort(){
        $this->emit("updateProductsWithPriceSort", $this->priceSort);
    }

    public function setCategory($category){
        
        $this->curCategory = $category;
        $categoryId = null;
        if($category != "semua"){
            $categoryId = $category;
        }

        $this->emit("updateProductsWithCategory", $categoryId);
    }
    
    public function setPriceRange(){
   
        $this->emit("updateProductsWithPriceRange", array("min" => $this->min, "max" => $this->max));
    }

    public function render()
    {
        return view('livewire.product-properties', ["max" => ProductController::getHighestPrice(), "min" => ProductController::getLowestPrice()]);
    }
}
