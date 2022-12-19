<div>
    <main class="content">
        
        <!-- BEGIN DETAIL MAIN BLOCK -->
        <div class="detail-block detail-block_margin">
            <x-dialog />
            <div class="wrapper">
                <div class="detail-block__content">
                    <h1>Wishlist</h1>
                    <ul class="bread-crumbs">
                        <li class="bread-crumbs__item">
                            <a href="#" class="bread-crumbs__link">Home</a>
                        </li>
                        <li class="bread-crumbs__item">Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- DETAIL MAIN BLOCK EOF   -->
        <!-- BEGIN WISHLIST -->
        <div class="wishlist" style="padding-top: 80px;">
            
            <div class="wrapper">
                
                <div class="cart-table">
                    <div class="cart-table__box">
                        <div class="cart-table__row cart-table__row-head">
                            <div class="cart-table__col">product</div>
                            <div class="cart-table__col">Price</div>
                            <div class="cart-table__col">status</div>
                            <div class="cart-table__col">Add to cart</div>
                            <div class="cart-table__col">Delete</div>
                        </div>
                        @foreach ($wishlists as $wishlist)
                            <div class="cart-table__row">
                                <div class="cart-table__col">
                                    <a href="{{route('getProductById', $wishlist->product->id)}}" class="cart-table__img">
                                        <img data-src="{{asset('storage/img/momo_product/') . '/' . $wishlist->product->image_product}}" src="{{asset('storage/img/momo_product/') . '/' . $wishlist->product->image_product}}" class="js-img" alt="">
                                    </a>
                                    <div class="cart-table__info">
                                        <a href="{{route('getProductById', $wishlist->product->id)}}" class="title5">{{$wishlist->product->name}}</a>
                                        <span class="cart-table__info-num">ID PRODUCT : {{$wishlist->product->id}}</span>
                                    </div>
                                </div>
                                <div class="cart-table__col">
                                    <span class="cart-table__price">{{number_format($wishlist->product->price, 2) }}</span>
                                </div>
                                <div class="cart-table__col">
                                    <span class="wishlist-stock">in stock</span>
                                </div>
                                <div class="cart-table__col">
                                    <button type="button" class="btn text-white" style="background: #D05278;" wire:click="addToCart('{{$wishlist->product->id}}')">Add to Cart</button>
                                </div>
                                <div class="cart-table__col">
                                    <button type="button" class="btn text-white" style="background: #D05278;" wire:click="delete('{{$wishlist->id}}')">Delete</button>
                                </div>
                            </div>
                        @endforeach
                        <div class="wishlist-buttons d-flex justify-content-center" style="margin-top: 20px; margin-bottom: 30px;">
                            <button type="button" class="btn text-white" style="background: #D05278;" wire:click="redirectToCart">Go Shopping</button>
                            
                        </div>
                       
                    </div>
                </div>
              
            </div>
            
        </div>
        
       
   

    </main>
    @livewire('footer')
</div>
