@extends('admin-page.template')

@section('cssImport')
@endsection

@section('content')
    
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="mt-0 header-title">Tabel Pengguna</h4>
            <p class="text-muted mb-3">DataTables has most features enabled by
                default, so all you need to do to use it with your own tables is to call
                the construction function: <code>$().DataTable();</code>.
            </p>
            
            <livewire:promo-table />
            
        </div>
    </div>
</div> <!-- end col -->





<script>

    window.addEventListener('showModal', event => {
        $('#editModal').modal('show');
    })
</script>
    
@endsection