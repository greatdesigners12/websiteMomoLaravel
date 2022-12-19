@extends('admin-page.template')

@section('cssImport')
@endsection

@section('content')
    
<livewire:promo-management>
    <script>
        function deleteId(id){
            $("#deletePromoId").val(id)
        }
    </script>

    
@endsection