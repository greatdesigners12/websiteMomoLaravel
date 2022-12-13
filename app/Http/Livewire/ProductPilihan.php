<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ProductPilihan extends Component
{

    public $allCategories;
    public $curCategory;
    public $curProducts;

    public function mount(){
        $this->curCategory = $this->allCategories[0]->id;
    }

    public function translateKeInggris($str){
        $tr = new GoogleTranslate('en'); 
        return $tr->translate($str);
    }

    public function translateKeChina($str){
        $tr = new GoogleTranslate('zh-CN'); 
        return $tr->translate($str);
    }

    public function setCategory($Category){
        $this->curCategory = $Category;
        
        $this->setProducts();
        $this->reInitSlider();
        
    }

    public function reInitSlider()
        {
            $this->dispatchBrowserEvent('initSlider');
        }

    public function setProducts(){
        $this->curProducts = Product::where("category_id", $this->curCategory)->limit(5)->get();
    }

    public function render()
    {
        
        return view('livewire.product-pilihan', ["allCategory" => $this->allCategories, "curProducts" => $this->curProducts]);
    }
}
