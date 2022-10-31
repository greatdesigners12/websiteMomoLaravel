<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ProductController;
use App\Models\Kategori;
use Livewire\Component;

class TrendingProduct extends Component
{

    public $kategori;
    public $curKategori;
    public $curProducts;

    public function mount(){
        
        $this->curKategori = $this->kategori[0]->id;
        

    }
    public function setKategori($kategori){
        $this->curKategori = $kategori;
        
        $this->setProducts();
        $this->reInitSlider();
        
    }

    public function reInitSlider()
        {
            $this->dispatchBrowserEvent('initSlider');
        }

    public function setProducts(){
        $this->curProducts = ProductController::getProductsBasedOnCategoryId($this->curKategori);
    }

    public function render()
    {
        
        return view('livewire.trending-product', ["allKategori" => $this->kategori, "curProducts" => $this->curProducts]);
    }
}
