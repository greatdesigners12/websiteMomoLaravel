<div>
    <div class="main-wrapper">

        <!-- BEGIN CONTENT -->
    
        <main class="content">
            <!-- BEGIN DETAIL MAIN BLOCK -->
            <div class="detail-block detail-block-checkout">
                <div class="wrapper">
                    <div class="detail-block__content">
                        <h1>Checkout</h1>
                        <ul class="bread-crumbs">
                            <li class="bread-crumbs__item">
                                <a href="#" class="bread-crumbs__link">Home</a>
                            </li>
                            <li class="bread-crumbs__item">
                                <a href="#" class="bread-crumbs__link">Shop</a>
                            </li>
                            <li class="bread-crumbs__item">Checkout</li>
                        </ul>
                        <div class="detail-block__items">
                            <div class="detail-block__item">
                                <div class="detail-block__item-icon">
                                    <img data-src="img/main-text-decor.svg"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
                                    <i class="icon-step1"></i>
                                </div>
                                <div class="detail-block__item-info">
                                    <h6>Step 1</h6>
                                    Order details
                                </div>
                            </div>
                            <div class="detail-block__item">
                                <div class="detail-block__item-icon">
                                    <img data-src="img/main-text-decor.svg"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
                                    <i class="icon-step2"></i>
                                </div>
                                <div class="detail-block__item-info">
                                    <h6>Step 2</h6>
                                    Payment method
                                </div>
                            </div>
                            <div class="detail-block__item">
                                <div class="detail-block__item-icon">
                                    <img data-src="img/main-text-decor.svg"
                                        src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
                                    <i class="icon-step3"></i>
                                </div>
                                <div class="detail-block__item-info">
                                    <h6>Step 3</h6>
                                    Finish!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- DETAIL MAIN BLOCK EOF   -->
            <!-- BEGIN CHECKOUT -->
            <div class="checkout checkout-step3">
                <div class="wrapper">
                    <div class="checkout-content">
                        <div class="checkout-purchase checkout-form">
                            <h4>
                                BeShop thanks<br>
                                you for your purchase!
                            </h4>
                            <p>Consequat minim ipsum aliquip quis ullamco aliquip consequat aliquip sit eu enim duis qui. Velit minim tempor non aliquip officia cillum. Irure Lorem do enim sint in commodo. Ea ea nostrud labore mollit nisi. Cupidatat esse minim mollit qui velit esse voluptate. Excepteur ad officia dolore amet magna ipsum dolor incididunt excepteur ad non. Ea ea qui irure excepteur est consectetur amet est exercitation in.</p>
                            <ul class="checkout-purchase__list">
                                <li><span>Order number</span>B-125724_75</li>
                                <li><span>Order status</span>Awaiting payment</li>
                                <li><span>Reserved for</span>22.09.2020</li>
                                <li><span>Expected loading date</span>20.09.2020</li>
                            </ul>
                            <a href="#" class="checkout-purchase__link">print a document -</a>
                        </div>
                        <div class="checkout-info">
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
                                    <a href="#" class="checkout-order__item-img">
                                        <img data-src="{{asset('storage/img/transaction_histories') . '/' . $item->transaction_product->imageProduct}}" src="{{asset('storage/img/transaction_histories') . '/' . $item->transaction_product->imageProduct}}" class="js-img" alt="">
                                    </a>
                                    <div class="checkout-order__item-info">
                                        <a class="title6" href="#">{{$item->transaction_product->name}} <span>{{$item->transaction_product->quantity}}x</span></a>
                                        <span class="checkout-order__item-price">{{$item->transaction_product->price}}</span>
                                        <span class="checkout-order__item-num">ID: {{$item->transaction_product->id}}</span>
                                    </div>
                                </div>
                                @endforeach
                               
                               
                            </div>
                            <div class="cart-bottom__total">
                                <div class="cart-bottom__total-goods">
                                    Goods on
                                    <span>{{$transactionDetail->total_price}}</span>
                                </div>
                                <div class="cart-bottom__total-promo">
                                    Discount on promo code
                                    <span>No</span>
                                </div>
                                <div class="cart-bottom__total-delivery">
                                    Delivery <span class="cart-bottom__total-delivery-date">({{$transactionDetail->date_transaction}})</span>
                                    <span>$30</span>
                                </div>
                                <div class="cart-bottom__total-num">
                                    total:
                                    <span>{{$transactionDetail->total_price}}</span>
                                </div>
                                <button class="btn" style="background-color: #D23377; color: white; height:40px;" wire:click="pay">PAY NOW</button>
                            </div>
                        </div>
                    </div>
                </div>
                <img class="promo-video__decor js-img" data-src="https://via.placeholder.com/1197x1371/FFFFFF"
                    src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">
            </div>
            <!-- CHECKOUT EOF   -->
            <!-- BEGIN INSTA PHOTOS -->
            <div class="insta-photos">
                <a href="#" class="insta-photo">
                    <img data-src="https://via.placeholder.com/320" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                        alt="">
                    <div class="insta-photo__hover">
                        <i class="icon-insta"></i>
                    </div>
                </a>
                <a href="#" class="insta-photo">
                    <img data-src="https://via.placeholder.com/320" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                        alt="">
                    <div class="insta-photo__hover">
                        <i class="icon-insta"></i>
                    </div>
                </a>
                <a href="#" class="insta-photo">
                    <img data-src="https://via.placeholder.com/320" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                        alt="">
                    <div class="insta-photo__hover">
                        <i class="icon-insta"></i>
                    </div>
                </a>
                <a href="#" class="insta-photo">
                    <img data-src="https://via.placeholder.com/320" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                        alt="">
                    <div class="insta-photo__hover">
                        <i class="icon-insta"></i>
                    </div>
                </a>
                <a href="#" class="insta-photo">
                    <img data-src="https://via.placeholder.com/320" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                        alt="">
                    <div class="insta-photo__hover">
                        <i class="icon-insta"></i>
                    </div>
                </a>
                <a href="#" class="insta-photo">
                    <img data-src="https://via.placeholder.com/320" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img"
                        alt="">
                    <div class="insta-photo__hover">
                        <i class="icon-insta"></i>
                    </div>
                </a>
            </div>
            <!-- INSTA PHOTOS EOF   -->
    
        </main>
    
        <!-- CONTENT EOF   -->
    
    
        <!-- HEADER EOF   -->
    
        <!-- BEGIN FOOTER -->
    
        <footer class="footer">
            <div class="wrapper">
                <div class="footer-top">
                    <div class="footer-top__social">
                        <span>Find us here:</span>
                        <ul>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-insta"></i></a></li>
                            <li><a href="#"><i class="icon-in"></i></a></li>
                        </ul>
                    </div>
                    <div class="footer-top__logo">
                        <img data-src="img/footer-logo.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                            class="js-img" alt="">
                    </div>
                    <div class="footer-top__payments">
                        <span>Payment methods:</span>
                        <ul>
                            <li><img data-src="img/payment1.png" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                                    class="js-img" alt=""></li>
                            <li><img data-src="img/payment2.png" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                                    class="js-img" alt=""></li>
                            <li><img data-src="img/payment3.png" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                                    class="js-img" alt=""></li>
                            <li><img data-src="img/payment4.png" src="data:image/gif;base64,R0lGODlhAQABAAAAACw="
                                    class="js-img" alt=""></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-nav">
                    <div class="footer-nav__col">
                        <span class="footer-nav__col-title">About</span>
                        <ul>
                            <li><a href="about.html">About us</a></li>
                            <li><a href="categories.html">Categories</a></li>
                            <li><a href="shop.html">Shop</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                        </ul>
                    </div>
                    <div class="footer-nav__col">
                        <span class="footer-nav__col-title">Categories</span>
                        <ul>
                            <li><a href="#">Make up</a></li>
                            <li><a href="#">SPA</a></li>
                            <li><a href="#">Perfume</a></li>
                            <li><a href="#">Nails</a></li>
                            <li><a href="#">Skin care</a></li>
                            <li><a href="#">Hair care</a></li>
                        </ul>
                    </div>
                    <div class="footer-nav__col">
                        <span class="footer-nav__col-title">Useful links</span>
                        <ul>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="#">Terms of use</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">Shipping details</a></li>
                            <li><a href="#">Information</a></li>
                        </ul>
                    </div>
                    <div class="footer-nav__col">
                        <span class="footer-nav__col-title">Contact</span>
                        <ul>
                            <li><i class="icon-map-pin"></i> 27 Division St, New York, NY 10002, USA</li>
                            <li>
                                <i class="icon-smartphone"></i>
                                <div class="footer-nav__col-phones">
                                    <a href="tel:+13459971345">+1 345 99 71 345</a>
                                    <a href="tel:+13457464975">+1 345 74 64 975</a>
                                </div>
                            </li>
                            <li><i class="icon-mail"></i><a href="mailto:info@beshop.com">info@beshop.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-copy">
                    <span>&copy; All rights reserved. BeShop 2020</span>
                </div>
            </div>
        </footer>
    
        <!-- FOOTER EOF   -->
    
    </div>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        window.addEventListener("openMidTransPopUp", event => {
            window.snap.pay(event.detail.snapToken, {
            onSuccess: function(result){
                /* You may add your own implementation here */
                alert("payment success!"); console.log(result);
            },
            onPending: function(result){
                /* You may add your own implementation here */
                alert("wating your payment!"); console.log(result);
            },
            onError: function(result){
                /* You may add your own implementation here */
                alert("payment failed!"); console.log(result);
            },
            onClose: function(){
                /* You may add your own implementation here */
                Livewire.emit('errorSession')
            }
            });
        });
    </script>
</div>
