<button class="btn btn-primary" >
    <a href="{{route('toEditannouncementPage', ["id" => $value])}}">EDIT</a>
</button>
<button class="btn btn-danger" wire:click="deleteAnnouncement('{{$value}}')">
    DELETE
</button>