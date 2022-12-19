<button class="btn btn-primary" >
    <a class="text-white no-text-decoration" href="{{route('toEditpromoPage', ["id" => $value])}}">EDIT</a>
</button>
<button class="btn btn-danger" onclick="deleteId({{ $value }})" data-toggle="modal" data-target="#deletePromo">
    DELETE
</button>