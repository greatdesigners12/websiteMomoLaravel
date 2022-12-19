<div class="col-12 mt-3">
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">Form Pengunguman Website</h4>
            @if (session()->has("message"))
                <div class="alert alert-success">
                    {{session()->get("message")}}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin-bottom: 0px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{$announcement == null ? route('processCreateannouncement') : route('processUpdateannouncement')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$announcement == null ? '' : $announcement->id}}">
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">{{ "Content" }}</label>
                 
                    <textarea class="form-control"  id="exampleInputEmail1" rows="5" value="" name="content" placeholder="Masukkan isi konten">{{$announcement == null ? '' : $announcement->content}}</textarea>
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group">
                    <label class="mb-3">{{ "Status Code" }}</label>
                    <select class="select2 form-control mb-2 custom-select" value="{{$announcement == null ? '' : $announcement->status}}" name="status"  style="width: 100%; height:36px;">
                        <option value="1"<?=($announcement == null ? '' : $announcement->status) == 1 ? ' selected="selected"' : '';?>>{{ "Aktif" }}</option>
                        <option value="0" <?=($announcement == null ? '' : $announcement->status) == 0 ? ' selected="selected"' : '';?>>{{ "Non-Aktif" }}</option>
                    
                    
                       
                    </select>
                </div>
                                                           
                                                                        
       
               
                <button type="submit" class="btn btn-gradient-primary">{{ "Kirim" }}</button>
                
                
    
        </form>   
                                      
    </div><!--end card-body-->
    <!--end card-->
    
        
    <script src="plugins/dropify/js/dropify.min.js"></script>
    <script src="helpers/jquery.form-upload.init.js"></script>
    
    
    
    
