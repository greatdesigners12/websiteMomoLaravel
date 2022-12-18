<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\FavouriteProduct;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use PDO;

class DetailProduct extends Component
{
    public $product;
    public $quantity = 1;
    public $isAddedToCart = false;
    public $isAddedToWishList = false;
    protected $listeners = ["updateProductPage"];

    

    public function minQuantity(){
        if($this->quantity > 1){
            $this->quantity--;
        }
        
    }

    public function addQuantity(){
        if($this->quantity <= $this->product->stock){
            $this->quantity--;
        }
        $this->quantity++;
    }

    public function addToCart(){
        $checkCart = Cart::where("product_id", $this->product->id)->where("user_id", Auth::id())->first();
        if($checkCart == null){
            Cart::create(["user_id" => Auth::id(), "product_id" => $this->product->id, "quantity" => $this->quantity]);
        }else{
            Cart::where("product_id", $this->product->id)->where("user_id", Auth::id())->delete();

        }
        $this->emitSelf("updateProductPage");
    }

    public function addToWishList(){
        $check = FavouriteProduct::where("product_id", $this->product->id)->where("user_id", Auth::id())->first();
        if($check == null){
            FavouriteProduct::create(["user_id" => Auth::id(), "product_id" => $this->product->id]);
        }else{
           
            FavouriteProduct::where("product_id", $this->product->id)->where("user_id", Auth::id())->delete();
        }   
        
        $this->emitSelf("updateProductPage");
    }

    public function updateProductPage(){
        
        $checkCart = Cart::where("product_id", $this->product->id)->where("user_id", Auth::id())->first();
        $checkWishList = FavouriteProduct::where("product_id", $this->product->id)->where("user_id", Auth::id())->first();
        
        $this->isAddedToCart = $checkCart != null;
        $this->isAddedToWishList = $checkWishList != null;
       
    }

    public function render()
    {
        
        return view('livewire.detail-product');
    }
}
