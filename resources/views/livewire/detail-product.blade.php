<div>
    <div class="main-wrapper">

        <!-- BEGIN CONTENT -->
    
        <main class="content">
        
            <!-- BEGIN DETAIL MAIN BLOCK -->
            <div class="detail-block detail-block_margin">
                <div class="wrapper">
                    <div class="detail-block__content">
                        <h1>Shop</h1>
                        <ul class="bread-crumbs">
                            <li class="bread-crumbs__item">
                                <a href="#" class="bread-crumbs__link">Home</a>
                            </li>
                            <li class="bread-crumbs__item">
                                <a href="#" class="bread-crumbs__link">Product</a>
                            </li>
                            <li class="bread-crumbs__item">{{$product->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- DETAIL MAIN BLOCK EOF   -->
            <!-- BEGIN PRODUCT -->
            <div class="product" style="margin-bottom: 50px;">
                <div class="wrapper">
                    <div class="product-content">
                        <div class="product-slider">
                            <div class="product-slider__main">
                                
                                <div class="product-slider__main-item">
                                    <img loading="lazy" src="{{asset('storage/img/momo_product/') . '/' . $product->image_product}}" alt="product">
                                </div>
                            </div>
                            
                        </div>
                        <div class="product-info">
                            <h3>{{$product->name}}</h3>
                            <span class="product-stock">in stock</span>
                            <span class="product-num">ID PRODUCT: {{$product->id}}</span>
                            <span class="product-price">{{number_format($product->price, 2) }}</span>
                            <p>{{$product->description}}</p>
                          
                            <div class="product-options">
                                <div class="product-info__quantity">
                                    <span class="product-info__quantity-title">Quantity:</span>
                                    <div class="counter-box">
                                        <span class="counter-link counter-link__prev" wire:click='minQuantity'><i class="icon-arrow"></i></span>
                                        <input type="text" class="counter-input" wire:model="quantity" disabled value="1">
                                        <span class="counter-link counter-link__next" wire:click='addQuantity'><i class="icon-arrow"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-buttons">
                                @if (Auth::check())
                                    <button class="btn btn-dark text-white" wire:click="addToCart"><i class="{{$isAddedToCart ? '' : 'icon-cart'}}" ></i> {{$isAddedToCart ? 'Added to cart' : 'cart'}} </button>
                                    <button class="btn text-white" style="background: #D05278;" wire:click="addToWishList"><i class="{{$isAddedToWishList ? '' : 'icon-heart'}}"></i> {{$isAddedToWishList ? 'Added to wishlist' : 'wish list'}}</button>
                                @else
                                    <button class="btn btn-dark" wire:click="addToCart"><i class="icon-cart" ></i> Order via Whatsapp</button>
                                @endif
                                
                            </div>
                        </div>
                    </div>
                   
            </main>
        </div>
    </div>
</div>
