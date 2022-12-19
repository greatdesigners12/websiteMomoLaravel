@extends('template')

@section('content')
<div class="main-wrapper">

    <!-- BEGIN CONTENT -->

    <main class="content">
        <!-- BEGIN DETAIL MAIN BLOCK -->
        <div class="detail-block detail-block_margin">
            <div class="wrapper">
                <div class="detail-block__content">
                    <h1>Cart</h1>
                    <ul class="bread-crumbs" style="padding-left: 0;">
                        <li class="bread-crumbs__item">
                            <a href="index.html" class="bread-crumbs__link">Home</a>
                        </li>
                        <li class="bread-crumbs__item">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- DETAIL MAIN BLOCK EOF   -->
        <!-- BEGIN CART -->
        <div class="cart" style="padding-top: 50px;">
            <div class="wrapper">
                <div class="cart-table">
                    <div class="cart-table__box">
                        <div class="cart-table__row cart-table__row-head">
                            
                            <div class="cart-table__col">Transaction</div>
                            
                            <div class="cart-table__col">Total Price</div>
                            <div class="cart-table__col text-center">Status</div>
                            <div class="cart-table__col text-center">Details</div>
                        </div>
                        
                         @foreach ($transactions as $index => $transaction)
                        
                         <div class="cart-table__row" wire:key="item-{{ $index }}">
                          
                            <div class="cart-table__col">
                                <a href="product.html" class="cart-table__img">
                                    
                                    <img data-src="{{asset('storage/img/transaction_histories') . '/' . $transaction->relation[0]->transaction_product->imageProduct}}" src="{{asset('storage/img/transaction_histories') . '/' . $transaction->relation[0]->transaction_product->imageProduct}}"  class="js-img" alt="">
                                </a>
                                <div class="cart-table__info">
                                    <a href="product.html" class="title5" wire:model="carts.{{$index}}.product.name">{{$transaction->relation[0]->transaction_product->name}}</a>
                                    <span class="cart-table__info-num">Invoice: {{$transaction->invoice}}</span>

                                    <span class="cart-table__info-num">{{$transaction->relation->count() > 1 ? '+' . $transaction->relation->count() . ' products' : ''}}</span>
                                </div>
                            </div>
                            <div class="cart-table__col">
                                <span class="cart-table__price">Rp. {{number_format($transaction->total_price, 2, '.', ',')}}</span>
                            </div>
                            <div class="cart-table__col d-flex justify-content-center">
                                <span class="alert {{$transaction->status == 'Terbayar' ? 'alert-success' : 'alert-danger'}} w-50 text-center">{{$transaction->status}}</span>
                            </div>
                            <div class="cart-table__col d-flex justify-content-center">
                                <button class="btn" style="background-color: #D23377; color: white; height:40px;"><a class="text-white text-decoration-none" href="{{$hasInformation ? route('toTransactionDetailPage', $transaction->invoice) : route('toUserInformationFormPage')}}">Details</a> </button>
                            </div>
                        </div>
                         @endforeach
                            
                       
                    </div>
                </div>
                
            </div>
           
        </div>
        

    </main>
</div>
@endsection