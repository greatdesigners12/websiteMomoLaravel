<button class="btn btn-primary" wire:click="openAdminEditModal('{{$value}}')">
    <a href="{{route('toEditadminpassPage', ["id" => $value])}}">CHANGE PASSWORD</a> 
 </button>

<button class="btn btn-primary" >
    <a href="{{route('toEditadminPage', ["id" => $value])}}">EDIT</a>
</button>
<button class="btn btn-danger" onclick="deleteId({{ $value }})" data-toggle="modal" data-target="#deleteAdmin" >
    DELETE
</button>