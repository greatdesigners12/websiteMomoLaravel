<div>
    
    <div class="col-12">
        <div class="card">
            <div class="card-body">
    
                <h4 class="mt-0 header-title">Tabel Pengguna</h4>
                <p class="text-muted mb-3">DataTables has most features enabled by
                    default, so all you need to do to use it with your own tables is to call
                    the construction function: <code>$().DataTable();</code>.
                </p>
                
                <livewire:admin-table />
                <div class="modal fade" id="deleteAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <input type="hidden" name="id">
                          Apakah kamu yakin untuk menghapus?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary" >Delete</button>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  
              
            </div>
        </div>
    </div> <!-- end col -->


</div>