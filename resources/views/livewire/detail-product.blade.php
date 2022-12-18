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
            <div class="product">
                <div class="wrapper">
                    <div class="product-content">
                        <div class="product-slider">
                            <div class="product-slider__main">
                                
                                <div class="product-slider__main-item">
                                    <img loading="lazy" src="{{route('storage/img/momo_product/') . $product->product_image}}" alt="product">
                                </div>
                            </div>
                            <div class="product-slider__nav">
                                
                                <div class="product-slider__nav-item">
                                    <img loading="lazy" src="{{route('storage/img/momo_product/') . $product->product_image}}" alt="product">
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
                    <div class="product-detail">
    
                        <div class="tab-wrap product-detail-tabs">
                            <ul class="nav-tab-list tabs">
                                
                                <li class="active">
                                    <a href="#product-tab_2">Reviews</a>
                                </li>
                            </ul>
                            <div class="box-tab-cont">
                                <div class="tab-cont hide" id="product-tab_1">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius perferendis amet
                                        ullam quisquam ad pariatur quo accusantium quos dolores commodi officiis, cumque
                                        iusto adipisci quae delectus temporibus et, cupiditate aliquam.</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi beatae provident
                                        ipsum omnis dolor sapiente maiores reiciendis exercitationem earum deleniti,
                                        reprehenderit iste ipsa saepe. Consectetur non et excepturi molestias esse?</p>
                                </div>
                                <div class="tab-cont product-reviews" id="product-tab_2">
                                    <div class="product-detail__items">
                                        <div class="review-item">
                                            <div class="review-item__head">
                                                <div class="review-item__author">
                                                    <img data-src="https://via.placeholder.com/40"
                                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                                                        alt="">
                                                    <span class="review-item__name">Melissa Jones</span>
                                                    <span class="review-item__date">July 23, 2020</span>
                                                </div>
                                                <div class="review-item__rating">
                                                    <ul class="star-rating">
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="review-item__content">
                                                I am grateful to the employees of BeShop for the quality products that I
                                                have been using
                                                for more than a year, try to work at this level in the future. Thank
                                                you)
                                            </div>
                                        </div>
                                        <div class="review-item">
                                            <div class="review-item__head">
                                                <div class="review-item__author">
                                                    <img data-src="https://via.placeholder.com/40"
                                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                                                        alt="">
                                                    <span class="review-item__name">Steve Gentley</span>
                                                    <span class="review-item__date">July 05, 2020</span>
                                                </div>
                                                <div class="review-item__rating">
                                                    <ul class="star-rating">
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="review-item__content">
                                                I am grateful to the employees of BeShop for the quality products that I have been using for more than a year, try to work at this level in the future. Thank you). I am grateful to the employees of BeShop for the quality products.
                                            </div>
                                        </div>
                                        <div class="review-item">
                                            <div class="review-item__head">
                                                <div class="review-item__author">
                                                    <img data-src="https://via.placeholder.com/40"
                                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                                                        alt="">
                                                    <span class="review-item__name">Amanda Clement</span>
                                                    <span class="review-item__date">June 15, 2020</span>
                                                </div>
                                                <div class="review-item__rating">
                                                    <ul class="star-rating">
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                        <li><i class="icon-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="review-item__content">
                                                I am grateful to the employees of BeShop for the quality products that I
                                                have been using
                                                for more than a year, try to work at this level in the future. Thank
                                                you)
                                            </div>
                                        </div>
                                        <a href="#" class="blog-item__link">show more <i
                                                class="icon-arrow-md"></i></a>
                                    </div>
                                    <div class="product-detail__form post-comment__form">
                                        <div class="subscribe-form__img">
                                            <img data-src="https://via.placeholder.com/157x108" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                                                class="js-img" alt="">
                                        </div>
                                        <form>
                                            <h4>leave a review</h4>
                                            <p>Your email address will not be published.</p>
                                            <div class="rating" data-id="rating_1"></div>
                                            <div class="box-field">
                                                <input type="text" class="form-control" placeholder="Enter your name">
                                            </div>
                                            <div class="box-field">
                                                <input type="email" class="form-control" placeholder="Enter your email">
                                            </div>
                                            <div class="box-field box-field__textarea">
                                                <textarea class="form-control"
                                                    placeholder="Enter your review"></textarea>
                                            </div>
                                            <button type="submit" class="btn">send</button>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <img class="promo-video__decor js-img" data-src="https://via.placeholder.com/1197x1371/FFFFFF"
                    src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">
                </div>
            </main>
        </div>
    </div>
</div>
