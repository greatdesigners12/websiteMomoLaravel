<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\TransactionGroup;
use App\Models\TransactionProduct;
use App\Models\TransactionRelation;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Services\Midtrans\CreateSnapTokenService;


class Carts extends Component
{
    public $carts;
    public $trial;
    
    protected $listeners = ["updateCart"];
    

    public function minPrice($product_id){
        Cart::where("product_id", $product_id)->where("user_id", Auth::id())->decrement("quantity");
        $this->emitSelf("updateCart");
    }

    public function addPrice($product_id){
        Cart::where("product_id", $product_id)->where("user_id", Auth::id())->increment("quantity");
        $this->emitSelf("updateCart");
    }

    public function deleteCart($product_id){
        Cart::where("product_id", $product_id)->where("user_id", Auth::id())->delete();
        $this->emitSelf("updateCart");
    }

    public function updateCart(){

    }

    public function checkout(){ 
        $this->getTotalPrice();  
        $invoice = hash("md5", $this->carts[0]->product->id . Auth::id() . now());
       
           
        $result = TransactionGroup::create(["invoice" => $invoice, "total_price" => $this->carts[$this->carts->count() - 1]["totalPrice"], "user_id" => Auth::id(),
        "date_transaction" => now(), "status" => "Belum bayar", "shipping_price" => 20000, "snap_token" => ""]);
        
        foreach($this->carts as $cart){
            $createdProduct = TransactionProduct::create(["price" => $cart->product->price, "quantity" => $cart->quantity, "name" => $cart->product->name, "imageProduct" => $cart->product->image_product]);
            Storage::copy('public/img/momo_product/' . $cart->product->image_product, 'public/img/transaction_histories/' . $cart->product->image_product);
            TransactionRelation::create(["transaction_group_id" => $result->id, "transaction_product_id" => $createdProduct->id]);
            Cart::where("id", $cart->id)->delete();
        }

        
        
        
    }

    public function getTotalPrice(){
        $total = 0;
        $this->carts = Cart::where("user_id", Auth::id())->get();
        foreach($this->carts as $cart){
            $total += ($cart->quantity * $cart->product->price); 
        }
       
        $this->carts[$this->carts->count() - 1]["totalPrice"] = $total;
    }

    public function render()
    {
        $this->getTotalPrice();
        return view('livewire.carts');
    }
}
