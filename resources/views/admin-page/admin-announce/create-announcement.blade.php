@extends('admin-page.template')

@section('content')

   <livewire:announcement-form :announcement="null" :promo="$promo"/>
   
@endsection