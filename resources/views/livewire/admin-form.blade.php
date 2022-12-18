<div>
                
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ "Form Admin" }}</h4>
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
                <form method="POST" action="{{$users == null ? route('processCreateadmin') : route('processUpdateadmin')}}" >
                    @csrf
                    <input type="hidden" name="id" value="{{$users == null ? '' : $users->id}}">
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">{{ "Email" }}</label>
                     
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$users == null ? '' : $users->email}}" name="email" placeholder="Masukkan email">
                        
                    </div>
                    @if($users==null)
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ "Kata Sandi" }}</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="password" placeholder="Masukkan kata sandi">
                        
                      
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ "Konfirmasi Kata Sandi" }}</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="password_confirm" placeholder="Masukkan konfirmasi kata sandi">
                        
                       
                    </div>
                    @endif
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">{{ "No. Telpon" }}</label>
                     
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$users == null ? '' : $users->phoneNumber}}" name="phonenumber" placeholder="Masukkan nomor telpon">
                        
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
    