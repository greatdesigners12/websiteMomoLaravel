@extends('template')

@section('content')
    <livewire:transaction-detail :transactionDetail="$transaction" />
@endsection