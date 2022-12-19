<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\FavouriteProduct;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use WireUi\Traits\Actions;

class WishListComponent extends Component
{
    public $wishlists;
    use Actions;

    protected $listeners = ["updateWishList"];

    public function mount(){
        $this->wishlists = FavouriteProduct::all();

    }

    public function addToCart($id){
        Cart::insert(["user_id" => Auth::id(), "product_id" => $id, "quantity" => 1]);
        FavouriteProduct::where("user_id", Auth::id())->where("product_id", $id)->delete();
        $this->dialog([

            'title'       => 'Added to cart',

            'description' => 'Added to cart successfully',

            'icon'        => 'success',
            'onClose' => [

                'method' => 'resetWishlist',

             

            ],

        ]);
        
    }

    public function redirectToCart(){
        return redirect()->route("toCartPage");
    }

    public function delete($id){
        FavouriteProduct::where("id", $id)->delete();
        $this->dialog([

            'title'       => 'Deleted',

            'description' => 'Deleted successfully',

            'icon'        => 'success',

            'onClose' => [
                'method' => 'resetWishlist',
            ]

        ]);

        $this->emitSelf("updateWishList");
    }

    public function updateWishList(){
        
    }

    public function resetWishlist(){
        $this->emitSelf("updateWishList");
    }

    public function render()
    {
        return view('livewire.wish-list-component');
    }
}
