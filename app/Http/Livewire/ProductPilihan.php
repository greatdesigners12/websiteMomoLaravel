<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ProductController;
use App\Models\Kategori;
use App\Models\Product;
use Livewire\Component;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ProductPilihan extends Component
{

    public $kategori;
    public $curKategori;
    public $curProducts;

    public function mount(){
        $this->curKategori = $this->kategori[0]->id;
    }

    public function translateKeInggris($str){
        $tr = new GoogleTranslate('en'); 
        return $tr->translate($str);
    }

    public function translateKeChina($str){
        $tr = new GoogleTranslate('zh-CN'); 
        return $tr->translate($str);
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
        $this->curProducts = Product::where("category_id", $this->curKategori)->limit(5)->get();
    }

    public function render()
    {
        
        return view('livewire.product-pilihan', ["allKategori" => $this->kategori, "curProducts" => $this->curProducts]);
    }
}
