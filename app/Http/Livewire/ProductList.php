<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ProductList extends Component
{   
    use WithPagination;
    
    protected $listeners = ["updateProductsWithPriceRange", "updateProductsWithSearch", "updateProductsWithCategory", "updateProductsWithPriceSort"];
  
    public $min;
    public $max;
    public $search;
    public $Category;
    public $priceSort;

    protected $paginationTheme = 'bootstrap';
    

    public function mount(){
        $this->priceSort = "lh";
    }

    public function translateKeInggris($str){
        $tr = new GoogleTranslate('en'); 
        return $tr->translate($str);
    }

    public function translateKeChina($str){
        $tr = new GoogleTranslate('zh-CN'); 
        return $tr->translate($str);
    }

    public function contactProduct($productName){
        return redirect()->to("https://wa.me/+62858957222220?text=saya%20tertarik%20dengan%20$productName");
    }

    public function updateProductsWithPriceRange($data){
       
        $this->min = $data["min"];
        $this->max = $data["max"];
        $this->resetPage();
    }

    public function updateProductsWithPriceSort($data){
       
        $this->priceSort = $data;
        $this->resetPage();
   
    }

    public function updateProductsWithSearch($data){
       
        $this->search = $data;
        $this->resetPage();
    }

    public function updateProductsWithCategory($data){
       
        $this->Category = $data;
        $this->resetPage();
    }



    public function render()
    {
        $curProducts = Product::select("*");
        if($this->min != null ){
            $curProducts->where("price", ">=", $this->min);
            
        }

        if($this->max != null){
            $curProducts->where("price", "<=", $this->max);
        }

        if($this->search != null){
            $curProducts->where("name", "like", "%" . $this->search . "%");
        }

        if($this->Category != null){
            $curProducts->where("category_id",  $this->Category);
            
        }
        $sort = "ASC";
        if($this->priceSort == "hl"){
            $sort = "DESC";
        }
        $curProducts->orderBy("price", $sort);
        return view('livewire.product-list', ["products" => $curProducts->paginate(9)]);
    }
}
