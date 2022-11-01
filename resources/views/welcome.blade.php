@extends('template')
@section('content')
    <div class="main-block load-bg">
        <div class="wrapper">
            <div class="main-block__content">
                <span class="saint-text">Professional</span>
                <h1 class="main-text">Beauty & Care</h1>
                <p>Nourish your skin with toxin-free cosmetic products. With the offers that you can’t refuse.
                </p>
                <a href="#" class="btn">Shop now</a>
            </div>
        </div>
    </div>
    
    <livewire:trending-product :kategori="$allKategori" :curProducts="$curProducts" />
    @livewire("testimonies")
    <livewire:brands :brands="$brands"  />
    <livewire:lokasi />
    @livewire("footer")         
@endsection