<div>

     <div class="container">
        <div class="row vh-100 vw-100">
            <div class="col-12 align-self-center">
                <div class="auth-page">
                    <div class="card auth-card shadow-lg">
                        <div class="card-body">
                            <div class="px-3">
                                <div class="auth-logo-box d-flex justify-content-center">
                                    <a href="../dashboard/analytics-index.html" class="logo logo-admin"><img src="{{asset('storage/img/logo.png')}}" style="width: 70px;" alt="logo" class="auth-logo"></a>
                                </div><!--end auth-logo-box-->
                                
                                <div class="text-center auth-logo-text">
                                    <h4 class="mt-0 mb-3 mt-5">Login</h4>
                                    <p class="text-muted mb-0">Sign in to continue to momo store.</p>  
                                </div> <!--end auth-logo-text-->  
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
                                
                                <form class="form-horizontal auth-form my-4" id="loginForm" method="POST" action="{{route('processLogin')}}">
        
                                    <div class="form-group">
                                        @csrf
                                        <label for="username">Email</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-user"></i> 
                                            </span>                                                                                                              
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                        </div>                                    
                                    </div><!--end form-group--> 
        
                                    <div class="form-group">
                                        <label for="userpassword">Password</label>                                            
                                        <div class="input-group mb-3"> 
                                            <span class="auth-form-icon">
                                                <i class="dripicons-lock"></i> 
                                            </span>                                                       
                                            <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter password">
                                        </div>                               
                                    </div><!--end form-group--> 
        
                                    <div class="form-group row mt-4">
                                        <div class="col-sm-6">
                                            <div class="custom-control custom-switch switch-success">
                                                <input type="checkbox" class="custom-control-input" id="customSwitchSuccess" name="rememberMe">
                                                <label class="custom-control-label text-muted" for="customSwitchSuccess">Remember me</label>
                                            </div>
                                        </div><!--end col--> 
                                        <div class="col-sm-6 text-right">
                                            <a href="{{route('toSendResetPasswordPage')}}" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>                                    
                                        </div><!--end col--> 
                                    </div><!--end form-group--> 
        
                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                        </div><!--end col--> 
                                    </div> <!--end form-group-->                           
                                </form><!--end form-->
                            </div><!--end /div-->
                            
                            <div class="m-3 text-center text-muted">
                                <p class="">Don't have an account ?  <a href="{{route('toRegisterPage')}}" class="text-primary ml-2">Register here</a></p>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                   
            </div><!--end col-->           
        </div><!--end row-->
    </div><!--end container-->
    
     
</div>
