@extends('admin-page.template')

@section('content')
   <livewire:announcement-form :announcement="$announcement"/>
   
@endsection