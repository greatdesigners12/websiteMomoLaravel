@extends('auth.template')

@section('content')
    <livewire:register-component :snapToken="$url" />
@endsection