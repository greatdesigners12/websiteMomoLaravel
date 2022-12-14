<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Brand;
use App\Models\product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use WireUi\Traits\Actions;

class productManagement extends Component
{
    public $products;
    
    public $curproduct;
    public $categories;
    public $brands;
    public $simpleModal;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $company_id;
    public $stock;
    protected $listeners = ['deleteMessage'];
    use Actions;

    public function mount(){
        $this->categories = Category::all();
        $this->brands = Brand::all();
        $this->curproduct = null;
        
    }

    public function deleteMessage(){
        session()->flash('message', 'The product has been deleted');
    }

    public function setId($id){
    //    $this->emit("setValue",  product::find($id)->toArray());
        
    }

    public function openModal($id){
        $this->simpleModal = true;
        $product = product::find($id);
        $this->name = $product->name;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->category_id = $product->category_id;
        $this->stock = $product->stock;
        $this->brand_id = $product->brand_id;
        $this->dispatchBrowserEvent("showModal");
    }

    

    

    
    public function render()
    { 
        $this->products = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')

        ->select('products.*', 'categories.category')

        ->get();
        return view('livewire.product-management', ["products" => $this->products]);
    }
}
