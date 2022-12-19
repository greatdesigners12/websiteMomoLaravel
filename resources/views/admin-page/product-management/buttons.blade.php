<button class="btn btn-primary" >
    <a class="no-text-decoration text-white" href="{{route('toEditProductPage', ["id" => $value])}}">EDIT</a>
</button>
<button class="btn btn-danger" wire:click="deletePdct('{{$value}}')">
    DELETE
</button>