<div>
    
    <div class="col-12">
        <div class="card mt-3">
            <div class="card-body">

                <h4 class="mt-0 header-title">Categories Management</h4>
                <p class="text-muted mb-3">All about categories management.</code>.
                </p>
                <button class="btn btn-primary mb-3" wire:click="openCategoryCreateModal">+ Create Category</button>
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

                    <x-card title="{{$method == 'edit' ? 'Edit' : 'Create'}} Category">
                
                        <p class="text-gray-600">
                
                                <x-input wire:model="name" label="Name" placeholder="Cetegory Name" />
                
                        </p>
                
                
                        <x-slot name="footer">
                
                            <div class="flex justify-end gap-x-4">
                
                                <x-button flat label="Cancel" x-on:click="close" />
                
                                <x-button primary label="{{$method == 'edit' ? 'Edit' : 'Create'}}" wire:click="updateCategory" />
                
                            </div>
                
                        </x-slot>
                
                    </x-card>
                
                </x-modal>
            </div>
        </div>
    </div> <!-- end col -->
 
</div>
