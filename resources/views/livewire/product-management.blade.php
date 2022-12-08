<div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Default Datatable</h4>
                <p class="text-muted mb-3">DataTables has most features enabled by
                    default, so all you need to do to use it with your own tables is to call
                    the construction function: <code>$().DataTable();</code>.
                </p>
                
                <livewire:product-table />
                
            </div>
        </div>
    </div> <!-- end col -->
 
    



    <script>

        window.addEventListener('showModal', event => {
            $('#editModal').modal('show');
        })
    </script>
</div>
