            
<div class="col-12 mt-3">
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">Buat Pengunguman Website</h4>
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
                 
                    <input type="text" class="form-control" id="exampleInputEmail1" rows="5" value="{{$announcement == null ? '' : $announcement->content}}" name="content" placeholder="Enter product name">
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group">
                    <label class="mb-3">{{ "Promo" }}</label>
                    <select class="select2 form-control mb-2 custom-select" value="{{$announcement == null ? '' : $announcement->promo_id}}" name="promo_id"  style="width: 100%; height:36px;">
                        <option value="">{{ "Pilih" }}</option>
                    
                        @foreach ($promo as $diskon =>$value)
                            
                            <option value="{{$diskon['id']}}" 
                            {{ ( $diskon->id == $existingRecordId) ? 'selected' : '' }}
                            >{{$diskon['code']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="mb-3">{{ "Status Code" }}</label>
                    <select class="select2 form-control mb-2 custom-select" id="promo_type" value="{{$announcement == null ? '' : $announcement->status}}" name="status"  style="width: 100%; height:36px;">
                        <option value="1">{{ "Aktif" }}</option>
                        <option value="0">{{ "Non-Aktif" }}</option>
                    
                       
                    </select>
                </div>
                                                           
                                                                        
       
               
                <button type="submit" class="btn btn-gradient-primary">{{ "Kirim" }}</button>
                
                
    
        </form>   
        <a href="/announcementManagement">
            <button class="btn btn-gradient-danger">Back</button>
        </a>                                        
    </div><!--end card-body-->
    <!--end card-->
    
        
    <script src="plugins/dropify/js/dropify.min.js"></script>
    <script src="helpers/jquery.form-upload.init.js"></script>
    
    
    
    