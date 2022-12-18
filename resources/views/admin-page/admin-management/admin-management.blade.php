@extends('admin-page.template')

@section('cssImport')
@endsection

@section('content')

<livewire:admin-management>
<script>
    deleteId(id){
        document.getElementById(id)
    }
</script>


    
@endsection