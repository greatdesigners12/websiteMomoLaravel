<?php

namespace App\Http\Livewire;

use App\Http\Controllers\productController;
use Livewire\Component;

class productProperties extends Component
{
   
    public $categories;
    public $min;
    public $max;
    public $search;
    public $curCategory;
    public $priceSort;

    public function search(){
        $this->emit("updateproductsWithSearch", $this->search);
    }

    public function mount(){
        $this->curCategory = "semua";
    }

    public function setPriceSort(){
        $this->emit("updateproductsWithPriceSort", $this->priceSort);
    }

    public function setCategory($category){
        
        $this->curCategory = $category;
        $categoryId = null;
        if($category != "semua"){
            $categoryId = $category;
        }

        $this->emit("updateproductsWithCategory", $categoryId);
    }
    
    public function setPriceRange(){
   
        $this->emit("updateproductsWithPriceRange", array("min" => $this->min, "max" => $this->max));
    }

    public function render()
    {
        return view('livewire.product-properties', ["max" => productController::getHighestPrice(), "min" => productController::getLowestPrice()]);
    }
}
