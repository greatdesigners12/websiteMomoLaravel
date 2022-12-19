@extends('template')

@section('content')
    <div class="detail-block detail-block_margin">
        <div class="wrapper">
            <div class="detail-block__content">
                <h1>User Information</h1>
                <ul class="bread-crumbs" style="padding-left: 0;">
                    <li class="bread-crumbs__item">
                        <a href="index.html" class="bread-crumbs__link">User Information</a>
                    </li>
                    <li class="bread-crumbs__item">User Information</li>
                </ul>
            </div>
        </div>
    </div>
    <livewire:user-information-form />
    @livewire('footer')
@endsection
