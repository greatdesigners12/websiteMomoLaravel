@extends('template')

@section('content')
<div>
        <main class="content">
            <div class="detail-block">
                <div class="wrapper">
                    <div class="detail-block__content">
                        <h1>About</h1>
                        <ul class="bread-crumbs">
                            <li class="bread-crumbs__item">
                                <a href="index.html" class="bread-crumbs__link  ">Home</a>
                            </li>
                            <li class="bread-crumbs__item">About</li>
                        </ul>
                        <div class="detail-block__items">
                            <div class="detail-block__item">
                                <div class="detail-block__item-icon">
                                    <img data-src="img/main-text-decor.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
                                    <i class="icon-shipping"></i>
                                </div>
                                <div class="detail-block__item-info">
                                    <h4 class="text-black">Pesan Antar</h4>
                                    Daerah Banyuwangi
                                </div>
                            </div>
                            <div class="detail-block__item">
                                <div class="detail-block__item-icon">
                                    <img data-src="img/main-text-decor.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
                                    <i class="icon-helpline"></i>
                                </div>
                                <div class="detail-block__item-info">
                                    <h4 class="text-black">Helpline</h4>
                                    +62-8589-5722-2220
                                </div>
                            </div>
                            <div class="detail-block__item">
                                <div class="detail-block__item-icon">
                                    <img data-src="img/main-text-decor.svg" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
                                    <i class="icon-24"></i>
                                </div>
                                <div class="detail-block__item-info">
                                    <h4 class="text-black">Open Hour</h4>
                                    08.30-20.30 WIB
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
    </div>
@endsection