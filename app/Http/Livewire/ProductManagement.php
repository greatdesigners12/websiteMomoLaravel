<?php

namespace App\Http\Livewire;

use App\Models\Kategori;
use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ProductManagement extends Component
{
    public $products;
    
    public $curProduct;
    public $curId;
    public $listeners = ["setId"];

    public function mount(){
        $this->categories = Kategori::all();
        $this->brands = Brand::all();
        $this->curProduct = null;
    }

    public function setId($id){
    //    $this->emit("setValue",  Product::find($id)->toArray());
        
    }



    

    public function render()
    { 
        $this->products = DB::table('products')
        ->join('category_general', 'products.category_id', '=', 'category_general.id')
        ->select('products.*', 'category_general.category_general')
        ->get();
        return view('livewire.product-management', ["products" => $this->products]);
    }
}
