@extends('auth.template')

@section('content')

        <livewire:kode-otp-verification :token="$token" />
        
@endsection