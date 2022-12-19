<div>
                
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ "Form Password Admin" }}</h4>
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
                <form method="POST" action="{{$users == null ? route('processCreateadmin') : route('processUpdatepassadmin')}}" >
                    @csrf
                    <input type="hidden" name="id" value="{{$users->id}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ "Kata Sandi" }}</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="password" placeholder="Masukkan kata sandi">
                        
                      
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ "Konfirmasi Kata Sandi" }}</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="password_confirm" placeholder="Masukkan konfirmasi kata sandi">
                        
                       
                    </div>
                    
                    
                    
                   
                    <button type="submit" class="btn btn-gradient-primary">{{ "Kirim" }}</button>
                  
                    
        
            </form>       
            <a href="/adminManagement">
                <button class="btn btn-gradient-danger">Back</button>
            </a>
                                                
        </div><!--end card-body-->
        <!--end card-->
        
            
        <script src="plugins/dropify/js/dropify.min.js"></script>
        <script src="helpers/jquery.form-upload.init.js"></script>
        
        
        
        
    </div>
    