<button class="btn btn-primary" wire:click="openAdminEditModal('{{$value}}')">
    <a class="text-white no-text-decoration" href="{{route('toEditadminpassPage', ["id" => $value])}}">CHANGE PASSWORD</a> 
 </button>

<button class="btn btn-primary" >
    <a class="text-white no-text-decoration" href="{{route('toEditadminPage', ["id" => $value])}}">EDIT</a>
</button>
<button class="btn btn-danger text-white no-text-decoration" onclick="deleteId({{ $value }})" data-toggle="modal" data-target="#deleteAdmin" >
    DELETE
</button>