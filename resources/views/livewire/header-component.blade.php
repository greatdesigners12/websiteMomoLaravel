<div>
    <header class="header">
        <div class="header-top">
            <span>{{__('ayo kunjungi instagram kami!')}}<a href="https://www.instagram.com/momoacc.bwi/" style="color:yellow; text-decoration-line:underline"> {{__('Klik Di Sini!')}}</a></span>
            <i class="header-top-close js-header-top-close icon-close"></i>
        </div>
        <div class="header-content">
            <div class="header-logo">
                <img src="img/logo.png" style="width: 100px;" alt="">
            </div>
            <div class="header-box">
                <ul class="header-nav">
                    
                    
                    <li><a href="/" class="{{Route::current()->getName() == 'home' ? 'active' : ''}}">{{__('Beranda')}}</a>  </li>
                    <li><a href="/products" class="{{Route::current()->getName() == 'products' ? 'active' : ''}}">{{__('Produk')}}</a></li>
                    <li><a href="/contact" class="{{Route::current()->getName() == 'contact' ? 'active' : ''}} ">{{__('Kontak Kami')}}</a></li>
                </ul>
                <ul class="header-options">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" style="background-color: #d05278;" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="fi fi-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="fi fi-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
                                @endif
                            @endforeach
                            </div>
                      </div>
                     
                </ul>
            </div>

            <div class="btn-menu js-btn-menu"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></div>
        </div>
    </header>
</div>
