@extends('admin-page.template')

@section('content')
<livewire:create-user :roles="$roles" :users="$user"/>   
   
@endsection