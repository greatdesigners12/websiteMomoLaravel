<div class="col-12">
    <div class="card mt-3">
        <div class="card-body">

            <h4 class="mt-0 header-title">Announcement Table</h4>
            <p class="text-muted mb-3">All about announcement table</code>.
            </p>

            <livewire:announcement-table />
            <div class="modal fade" id="deleteAnnounce" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <form action="{{ route('deleteAnnouncement') }}" method="POST">
                    @csrf
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="id" id="deleteAnnouncementId">
                                Apakah kamu yakin untuk menghapus?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>
