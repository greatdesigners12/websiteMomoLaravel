<div>
    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <h4 class="mt-0 header-title">Brand Management</h4>
                <p class="text-muted mb-3">All about brand management</code>.
                </p>
                <button class="btn btn-primary my-3" wire:click="openCreateBrandModal">+ Create Brand</button>
                <img src="{{asset('storage/img/momo_partner/1670940595.png')}}" alt="">
                @if (session()->has('message'))

                <div class="alert alert-success">
    
                    {{ session('message') }}
    
                </div>
    
            @endif
                <livewire:brand-table />
                <x-dialog />
                <x-modal.card title="{{$status == 'create' ? 'Create' : 'Edit'}} Brand" blur wire:model.defer="openModal">
                    <div class="px-3">
                
                        <div class="form-group">
                            <label for="exampleInputEmail1">Brand Name</label>
                            <input type="text" class="form-control" wire:model.defer="name" placeholder="Enter brand name">
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Update photo</label>
                            <div class="mb-3">
                               
                                <input wire:model.defer="photo" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                                @error('photo') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <label for="exampleInputEmail1">Preview image</label>
                            
                            <img src="{{ $photo == null ? asset('storage/img/momo_partner/' . $curPhotoUrl) : $photo->temporaryUrl() }}" style="width: 20%;" alt="">
                           
                         
                        </div>
                      
                        
                        
                
                
                    </div>
                
                
                
                    <x-slot name="footer">
                
                        <div class="flex justify-between gap-x-4">
                
                           
                
                
                
                            <div class="flex">
                
                                <x-button flat label="Cancel" x-on:click="close" />
                
                                <x-button primary label="update" wire:click="updateBrand" />
                
                            </div>
                
                        </div>
                
                    </x-slot>
                
                </x-modal.card>
                
            </div>
        </div>
    </div> <!-- end col -->
    
</div>
