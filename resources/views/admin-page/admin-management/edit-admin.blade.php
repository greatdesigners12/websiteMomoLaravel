@extends('admin-page.template')

@section('content')
<livewire:admin-form :roles="$roles" :users="$user"/>   
   
@endsection