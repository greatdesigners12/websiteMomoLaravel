<div>
    @if (session()->has("message"))
        <div class="alert alert-success">
            {{session()->get("message")}}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="margin-bottom: 0px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Default Datatable</h4>
                <p class="text-muted mb-3">DataTables has most features enabled by
                    default, so all you need to do to use it with your own tables is to call
                    the construction function: <code>$().DataTable();</code>.
                </p>
                
                <livewire:brand-table />
                <x-dialog />
                
            </div>
        </div>
    </div> <!-- end col -->
    
</div>
