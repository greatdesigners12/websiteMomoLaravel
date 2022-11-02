@extends('template')
@section('content')
    <div class="main-block load-bg">
        <div class="wrapper">
            <div class="main-block__content">
                <span class="saint-text">{{__('MOMO Accessories')}}</span>
                <h1 class="main-text">{{__('Aksesoris Dan Kosmetik')}}</h1>
                <p>{{__('Terlengkap dengan kualitas terbaik di Banyuwangi')}}
                </p>
                <button  class="btn btn-lg btn-dark" style="width: 60%;" ><a href="{{ route('products') }}" class="text-white " style="text-decoration: none;"> {{__('Belanja Sekarang !')}}</a></button>
            </div>
        </div>
    </div>
    
    <livewire:product-pilihan :kategori="$allKategori" :curProducts="$curProducts" />
    @livewire("testimonies")
    <livewire:brands :brands="$brands"  />
    <livewire:lokasi />
    @livewire("footer")         
@endsection