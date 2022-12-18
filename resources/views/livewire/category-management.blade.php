<div>
    
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Default Datatable</h4>
                <p class="text-muted mb-3">DataTables has most features enabled by
                    default, so all you need to do to use it with your own tables is to call
                    the construction function: <code>$().DataTable();</code>.
                </p>
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
                <livewire:category-table />
                <x-dialog />
                <x-modal wire:model.defer="editModal">

                    <x-card title="Edit Category">
                
                        <p class="text-gray-600">
                
                                <x-input wire:model="name" label="Name" placeholder="User's first name" />
                
                        </p>
                
                
                        <x-slot name="footer">
                
                            <div class="flex justify-end gap-x-4">
                
                                <x-button flat label="Cancel" x-on:click="close" />
                
                                <x-button primary label="Edit" wire:click="updateCategory" />
                
                            </div>
                
                        </x-slot>
                
                    </x-card>
                
                </x-modal>
            </div>
        </div>
    </div> <!-- end col -->
 
</div>
