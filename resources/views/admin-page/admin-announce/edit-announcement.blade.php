@extends('admin-page.template')

@section('content')
   <livewire:announcement-form :promo="$promo" :announcement="$announcement"/>
   
@endsection