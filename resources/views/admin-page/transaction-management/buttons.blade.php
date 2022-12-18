@if ($row["status"] != "belum_bayar")
    <button class="btn btn-primary" wire:click="openUpdateResiModal({{$value}})">
        Update Resi
    </button>
@endif
