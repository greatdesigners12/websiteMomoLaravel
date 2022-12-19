<div>
    <div class="main-wrapper">

        <!-- BEGIN CONTENT -->
    
        <main class="content">
            <!-- BEGIN DETAIL MAIN BLOCK -->
            <div class="detail-block detail-block-checkout">
                <div class="wrapper">
                    <div class="detail-block__content">
                        <h1>Trancaction Detail</h1>
                        <ul class="bread-crumbs">
                            <li class="bread-crumbs__item">
                                <a href="#" class="bread-crumbs__link">Home</a>
                            </li>
                            <li class="bread-crumbs__item">
                                <a href="#" class="bread-crumbs__link">Shop</a>
                            </li>
                            <li class="bread-crumbs__item">Trancaction Detail</li>
                        </ul>
                        
                    </div>
                </div>
            </div>
            <!-- DETAIL MAIN BLOCK EOF   -->
            <!-- BEGIN CHECKOUT -->
            <div class="checkout checkout-step3" style="padding-top: 40px;">
                <div class="wrapper">
                    <div class="checkout-content">
                        <div class="checkout-info w-100">
                            <div class="checkout-order">
                                <h5>Your Order</h5>
                                <div>
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}, silahkan reset transaksi melalui link berikut : <button style="font-weight: bold; text-decoration:underline;" wire:click="resetSnapToken">link</button>
                                        </div>
                            
                                    @endif
                                </div>
                                @foreach ($transactionDetail->relation as $item)
                                <div class="checkout-order__item">
                                    <a href="{{route('getProductById', $product->id)}}" class="checkout-order__item-img">
                                        <img data-src="{{asset('storage/img/transaction_histories') . '/' . $item->transaction_product->imageProduct}}" src="{{asset('storage/img/transaction_histories') . '/' . $item->transaction_product->imageProduct}}" class="js-img" alt="">
                                    </a>
                                    <div class="checkout-order__item-info">
                                        <a class="title6" href="{{route('getProductById', $product->id)}}">{{$item->transaction_product->name}} <span>{{$item->transaction_product->quantity}}x</span></a>
                                        <span class="checkout-order__item-price">{{number_format($item->transaction_product->price, 2)}}</span>
                                        <span class="checkout-order__item-num">ID: {{$item->transaction_product->id}}</span>
                                    </div>
                                </div>
                                @endforeach
                               
                               
                            </div>
                            @if ($transactionDetail->status != "Terbayar")
                                <x-select

                                    label="Select Courier"

                                    placeholder="Select courier"
                                    x-on:selected="$wire.getShippingPrice()"
                                    :options="[
                                        ['name' => 'JNE',  'value' => 'jne'],
                                        ['name' => 'POS INDONESIA', 'value' => 'pos'],
                                        ['name' => 'TIKI',   'value' => 'tiki'],
                                    ]"
                                    option-label="name"
                                    option-value="value"
                                    wire:model.defer="courier"

                                />
                                @if ($services == null)
                                    <div style="height: 10px;"></div>
                                @endif
                                
                                @if ($services != null)
                                    
                                    <select class="form-control my-3" >
                                        <h5>Services</h5>
                                        <option value="">Select services</option>
                                        @foreach ($services as $service)
                                        
                                            <option wire:click="selectShippingPrice('{{$service["service"]}}')">{{$service["service"]}} - {{number_format($service["cost"][0]["value"], 2)}}</option>
                                        @endforeach
                                        
                                    </select>
                                @endif
                                <div class="d-flex align-items-end">
                                    <div style="width: 80%;">
                                        <x-input wire:model="promoCode" label="Promo code" placeholder="Input the promo code" />
                                    </div>
                                    <div class="d-flex justify-content-center" style="width: 20%;">
                                        <x-button primary label="Verify promo code" wire:click="verifyPromoCode"  />
                                    </div>
                                </div>
                                
                                <div style="height: 50px;"></div>
                             @endif
                            <div class="cart-bottom__total w-100">
                                <div class="cart-bottom__total-goods">
                                    Goods on
                                    <span>{{number_format($transactionDetail->total_price, 2)}}</span>
                                </div>
                                <div class="cart-bottom__total-promo">
                                    Shipping price
                                    <span>{{number_format($shippingPrice, 2)}}</span>
                                </div>

                                <div class="cart-bottom__total-promo">
                                    Discount
                                    <span>{{$discount != 0 ? $discount . ' %' : 'without discount'}}</span>
                                </div>
                                
                                <div class="cart-bottom__total-num">
                                    total:
                                    @if ($discount != 0)
                                        <span>{{ number_format(($transactionDetail->total_price) - (($transactionDetail->total_price) * ($discount/100)) + $shippingPrice, 2)}}</span>
                                    @else
                                        <span>{{ number_format($transactionDetail->total_price + $shippingPrice, 2)}}</span>
                                    @endif
                                    
                                </div>
                                @if ($transactionDetail->status == "Terbayar")
                                    <div class="cart-bottom__total-num">
                                        No resi:
                                        @if ($transactionDetail->no_resi == "")
                                            <span>In Progress...</span>
                                        @else
                                            <span>{{ $transactionDetail->no_resi}}</span>
                                        @endif
                                        
                                    </div>
                                @else
                                    <button class="btn" style="background-color: #D23377; color: white; height:40px;" {{$shippingPrice == null ? 'disabled' : ''}} wire:click="pay">PAY NOW</button>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <x-dialog />
            </div>
            <!-- CHECKOUT EOF   -->
            <!-- BEGIN INSTA PHOTOS -->
            
            <!-- INSTA PHOTOS EOF   -->
    
        </main>
    
        <!-- CONTENT EOF   -->
    
    
        <!-- HEADER EOF   -->
    
        <!-- BEGIN FOOTER -->
    
   
    
        <!-- FOOTER EOF   -->
    
    </div>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        window.addEventListener("openMidTransPopUp", event => {
            window.snap.pay(event.detail.snapToken, {
            onSuccess: function(result){
                /* You may add your own implementation here */
                Livewire.emit("paymentSuccess");
            },
            onPending: function(result){
                /* You may add your own implementation here */
                alert("wating your payment!"); 
            },
            onError: function(result){
                /* You may add your own implementation here */
                alert("payment failed!"); 
            },
            onClose: function(){
                /* You may add your own implementation here */
                Livewire.emit('errorSession')
            }
            });
        });
    </script>
</div>
