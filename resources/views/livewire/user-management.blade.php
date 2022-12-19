<div>
    <div class="col-12">
        <div class="card mt-3">
            <div class="card-body">
                <div>

                    @if (session()->has('success'))
            
                        <div class="alert alert-success">
            
                            {{ session('success') }}
            
                        </div>
            
                    @elseif(session()->has('error'))
                    <div class="alert alert-danger">
            
                        {{ session('error') }}
        
                    </div>
                    @else

                    @endif
            
                </div>
                <livewire:user-table />
                <x-modal blur wire:model.defer="whatsappModal">

                    <x-card title="Whatsapp Broadcast">
                
                        <p class="text-gray-600">
                
                            <x-input wire:model="title" label="Name" placeholder="Please write the title of message" />
                            <div style="height: 10px;"></div>
                            <x-textarea label="content" wire:model="content" placeholder="Please write the content of message" />
                        </p>
                
                        
                
                        <x-slot name="footer">
                
                            <div class="flex justify-end gap-x-4">
                
                                <x-button flat label="Cancel" x-on:click="close" />
                
                                <x-button primary label="Broadcast" wire:click="broadcastWhatsapp" />
                
                            </div>
                
                        </x-slot>
                
                    </x-card>
                
                </x-modal>
            </div>
        </div>
    </div>
</div>
