<?php

namespace App\Http\Livewire;

use App\Http\Controllers\productController;
use App\Models\Category;
use App\Models\product;
use Livewire\Component;
use Stichoza\GoogleTranslate\GoogleTranslate;

class productPilihan extends Component
{

    public $category;
    public $curCategory;
    public $curproducts;

    public function mount(){
        $this->curCategory = $this->category[0]->id;
    }

    public function translateKeInggris($str){
        $tr = new GoogleTranslate('en'); 
        return $tr->translate($str);
    }

    public function translateKeChina($str){
        $tr = new GoogleTranslate('zh-CN'); 
        return $tr->translate($str);
    }

    public function setCategory($category){
        $this->curCategory = $category;
        
        $this->setproducts();
        $this->reInitSlider();
        
    }

    public function reInitSlider()
        {
            $this->dispatchBrowserEvent('initSlider');
        }

    public function setproducts(){
        $this->curproducts = product::where("category_id", $this->curCategory)->limit(5)->get();
    }

    public function render()
    {
        
        return view('livewire.product-pilihan', ["allCategory" => $this->category, "curproducts" => $this->curproducts]);
    }
}
