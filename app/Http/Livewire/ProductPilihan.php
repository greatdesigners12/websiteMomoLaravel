<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\FavouriteProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\DB;

class productPilihan extends Component
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

        
        $this->setproducts();
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
        $this->curProducts = DB::table('products')->leftJoin("favourite_products", function ($join) {
            $join->on('products.id', '=', 'favourite_products.product_id')
                 ->where('favourite_products.user_id', '=', Auth::id());
        })->select('products.*', 'favourite_products.user_id')->where('category_id', 1)->limit(5)->get();
        
        return view('livewire.product-pilihan', ["allCategory" => $this->allCategories, "curProducts" => $this->curProducts]);
    }
}
