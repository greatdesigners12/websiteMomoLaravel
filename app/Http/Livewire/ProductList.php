<?php

namespace App\Http\Livewire;

use App\Models\product;
use Livewire\Component;
use Livewire\WithPagination;
use Stichoza\GoogleTranslate\GoogleTranslate;

class productList extends Component
{   
    use WithPagination;
    
    protected $listeners = ["updateproductsWithPriceRange", "updateproductsWithSearch", "updateproductsWithCategory", "updateproductsWithPriceSort"];
  
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

    public function contactproduct($productName){
        return redirect()->to("https://wa.me/+62858957222220?text=saya%20tertarik%20dengan%20$productName");
    }

    public function updateproductsWithPriceRange($data){
       
        $this->min = $data["min"];
        $this->max = $data["max"];
        $this->resetPage();
    }

    public function updateproductsWithPriceSort($data){
       
        $this->priceSort = $data;
        $this->resetPage();
   
    }

    public function updateproductsWithSearch($data){
       
        $this->search = $data;
        $this->resetPage();
    }

    public function updateproductsWithCategory($data){
       
        $this->Category = $data;
        $this->resetPage();
    }



    public function render()
    {
        $curproducts = product::select("*");
        if($this->min != null ){
            $curproducts->where("price", ">=", $this->min);
            
        }

        if($this->max != null){
            $curproducts->where("price", "<=", $this->max);
        }

        if($this->search != null){
            $curproducts->where("name", "like", "%" . $this->search . "%");
        }

        if($this->Category != null){
            $curproducts->where("category_id",  $this->Category);
            
        }
        $sort = "ASC";
        if($this->priceSort == "hl"){
            $sort = "DESC";
        }
        $curproducts->orderBy("price", $sort);
        return view('livewire.product-list', ["products" => $curproducts->paginate(9)]);
    }
}
