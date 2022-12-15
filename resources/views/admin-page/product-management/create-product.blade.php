@extends('admin-page.template')

@section('content')
   <livewire:product-form :categories="$categories" :brands="$brands" :product="null"/>

   
@endsection