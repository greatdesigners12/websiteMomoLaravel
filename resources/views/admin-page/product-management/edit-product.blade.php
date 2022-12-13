@extends('admin-page.template')

@section('content')
   <livewire:create-product :categories="$categories" :brands="$brands" :product="$product"/>
   
@endsection