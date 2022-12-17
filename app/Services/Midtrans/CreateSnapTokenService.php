<?php
 
namespace App\Services\Midtrans;
 
use Midtrans\Snap;
 
class CreateSnapTokenService extends Midtrans
{
    protected $invoice;
    protected $totalPrice;
    protected $products;
    protected $user;
    
    public function __construct($invoice, $totalPrice, $products, $userInformation)
    {
        parent::__construct();
        $this->totalPrice = $totalPrice;
        $this->invoice = $invoice;
        $this->products = $products;
        $this->user = $userInformation;
    }
 
    public function getSnapToken()
    {
        $items = [];
        foreach($this->products as $product){
            
            array_push($items, ["id" => $product->id, "price" => $product->transaction_product->price, "quantity" => $product->transaction_product->quantity, "name" => $product->transaction_product->name]);
        }
        
        $params = [
            'transaction_details' => [
                'order_id' => $this->invoice,
                'gross_amount' => $this->totalPrice,
            ],
            'item_details' => $items,
            'customer_details' => [
                'full_name' => $this->user->user_information->nama_lengkap,
                'email' => $this->user->email,
                'phone' => $this->user->phoneNumber,
            ]
        ];
        
        $snapToken = Snap::getSnapToken($params);
 
        return $snapToken;
    }
}

?>