<button class="btn btn-primary" >
    <a href="{{route('toedituserPage', ["id" => $value])}}">EDIT</a>
</button>
<button class="btn btn-danger" wire:click="deletePdct('{{$value}}')">
    DELETE
</button>