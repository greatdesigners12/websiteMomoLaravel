@extends('admin-page.template')

@section('cssImport')
@endsection

@section('content')

<livewire:announcement-management>
<script>
    function deleteId(id){
        $("#deleteAnnouncementId").val(id)
    }
</script>

@endsection




    








    
