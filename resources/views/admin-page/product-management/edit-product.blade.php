@extends('admin-page.template')

@section('content')

   <livewire:product-form :categories="$categories" :brands="$brands" :product="$product"/>

@endsection