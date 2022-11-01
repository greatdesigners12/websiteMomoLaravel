<div>
    <header class="header">
        <div class="header-top">
            <span>30% OFF ON ALL PRODUCTS ENTER CODE: beshop2020</span>
            <i class="header-top-close js-header-top-close icon-close"></i>
        </div>
        <div class="header-content">
            <div class="header-logo">
                <img src="img/header-logo.svg" alt="">
            </div>
            <div class="header-box">
                <ul class="header-nav">
                    
                    
                    <li><a href="/" class="{{Route::current()->getName() == 'home' ? 'active' : ''}}">Home</a>  </li>
                    <li><a href="/products" class="{{Route::current()->getName() == 'products' ? 'active' : ''}}">Products</a></li>
                    <li><a href="/about" class="{{Route::current()->getName() == 'about' ? 'active' : ''}} ">About Us</a></li>
                </ul>
                <ul class="header-options">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" style="background-color: #d05278;" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="img/momo_product/{{}}" alt="">
                          Dropdown button
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                      </div>
                </ul>
            </div>

            <div class="btn-menu js-btn-menu"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></div>
        </div>
    </header>
</div>
