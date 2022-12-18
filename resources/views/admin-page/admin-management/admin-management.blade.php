@extends('admin-page.template')

@section('cssImport')
@endsection

@section('content')

<livewire:admin-management>
<script>
    function deleteId(id){
        $("#deleteAdminId").val(id)
    }
</script>


    
@endsection