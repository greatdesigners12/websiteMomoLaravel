@extends('template')

@section('section')
<main class="content">
    <!-- BEGIN DETAIL MAIN BLOCK -->
    <div class="detail-block detail-block_margin">
        <div class="wrapper">
            <div class="detail-block__content">
                <h1>{{__('Profile')}}</h1>
                <ul class="bread-crumbs" style="padding-left:0;">
                    <li class="bread-crumbs__item">
                        <a href="/" class="bread-crumbs__link">{{__('Beranda')}}</a>
                    </li>
                    <li class="bread-crumbs__item">{{__('Profile')}}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
@endsection



