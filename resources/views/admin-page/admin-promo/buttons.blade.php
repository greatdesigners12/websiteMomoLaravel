<button class="btn btn-primary" >
    <a href="{{route('toEditpromoPage', ["id" => $value])}}">EDIT</a>
</button>
<button class="btn btn-danger" wire:click="deletePromo('{{$value}}')">
    DELETE
</button>