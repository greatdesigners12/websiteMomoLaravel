<div>
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-body">
                <div>

                    @if (session()->has('message'))

                        <div class="alert alert-success">

                            {{ session('message') }}

                        </div>

                    @endif

                </div>
                <livewire:transaction-table />
                
                <x-modal wire:model.defer="updateModal">

                    <x-card title="Update Resi">
                
                        <x-input label="Nomor resi" placeholder="Input no resi" wire:model="noResi" />
                
                
                        <x-slot name="footer">
                
                            <div class="flex justify-end gap-x-4">
                
                                <x-button flat label="Cancel" x-on:click="close" />
                
                                <x-button primary label="Update" wire:click="updateNomerResi" />
                
                            </div>
                
                        </x-slot>
                
                    </x-card>
                
                </x-modal>
            </div>
        </div>
    </div>
</div>
