<div>
                
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ "Buat User" }}</h4>
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
                <form method="POST" action="{{route('processCreateuser')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">{{ "Email" }}</label>
                     
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$users == null ? '' : $users->email}}" name="email" placeholder="Enter email">
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ "Password" }}</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$users == null ? '' : $users->password}}" name="password" placeholder="Enter password">
                        
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label class="mb-3">{{ "Role" }}</label>
                        @if ($users == null ? '' :$users->role_id==1)
                        <select class="select2 form-control mb-2 custom-select" value="{{$users == null ? '' : $users->role_id}}" name="role_id"  style="width: 100%; height:36px;" disabled >
                            <option>{{ "Owner" }}</option>
                        </select>
                        
                        @else

                        <select class="select2 form-control mb-2 custom-select" value="{{$users == null ? '' : $users->role_id}}" name="role_id"  style="width: 100%; height:36px;"  >
                            <option>{{ "Pilih" }}</option>
                        
                            @foreach ($roles as $role)
                                @if ($role['id']!=1)
                                <option value="{{$role['id']}}">{{$role['name']}}</option>
                                @endif
                               
                            @endforeach
                        </select>
                        @endif
                        
                    </div>
                    
                    
                   
                    <button type="submit" class="btn btn-gradient-primary">{{ "Kirim" }}</button>
                    
                    
        
            </form>                                           
        </div><!--end card-body-->
        <!--end card-->
        
            
        <script src="plugins/dropify/js/dropify.min.js"></script>
        <script src="helpers/jquery.form-upload.init.js"></script>
        
        
        
        
    </div>
    