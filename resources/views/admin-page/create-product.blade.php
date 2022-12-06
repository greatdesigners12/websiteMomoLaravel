@extends('admin-page.template')

@section('content')
   <livewire:create-product :categories="$categories" :brands="$brands" :product="null"/>
   
@endsection