<button class="btn btn-primary" >
    <a href="{{route('toEditpromoPage', ["id" => $value])}}">EDIT</a>
</button>
<button class="btn btn-danger" onclick="deleteId({{ $value }})" data-toggle="modal" data-target="#deletePromo">
    DELETE
</button>