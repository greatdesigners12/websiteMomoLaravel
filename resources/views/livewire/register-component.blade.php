<div>
    
   



    {{-- <form method="POST" action="{{route('processRegister')}}">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirm" class="form-control" >
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form> --}}
     <!-- Log In page -->
     <div class="container">
        <div class="row vh-100 vw-100">
            <div class="col-12 align-self-center">
                <div class="auth-page">
                    <div class="card auth-card shadow-lg">
                        <div class="card-body">
                            <div class="px-3">
                                <div class="auth-logo-box">
                                    <a href="../dashboard/analytics-index.html" class="logo logo-admin"><img src="../assets/images/logo-sm.png" height="55" alt="logo" class="auth-logo"></a>
                                </div><!--end auth-logo-box-->
                                
                                <div class="text-center auth-logo-text">
                                    <h4 class="mt-0 mb-3 mt-5">Free Register for Crovex</h4>
                                    <p class="text-muted mb-0">Get your free Crovex account now.</p>  
                                </div> <!--end auth-logo-text-->  
                                @if ($errors->any())
                                <div class="alert alert-danger" >
                                    <ul style="margin-bottom: 0px;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                                
                                <form class="form-horizontal auth-form my-4" id="registerForm" action="{{route('processRegister')}}" method="POST">
        
                                    @csrf

                                    <div class="form-group">
                                        <label for="useremail">Email</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-mail"></i> 
                                            </span>                                                                                                              
                                            <input type="email" name="email" class="form-control" id="useremail" placeholder="Enter Email">
                                        </div>                                    
                                    </div><!--end form-group-->
                                    <div class="form-group">
                                        <label for="useremail">No telp</label>
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon">
                                                <i class="dripicons-mail"></i> 
                                            </span>                                                                                                              
                                            <input type="text" name="noTelp" class="form-control" placeholder="Enter No Telp">
                                        </div>                                    
                                    </div><!--end form-group-->
        
                                    <div class="form-group">
                                        <label for="userpassword">Password</label>                                            
                                        <div class="input-group mb-3"> 
                                            <span class="auth-form-icon">
                                                <i class="dripicons-lock"></i> 
                                            </span>                                                       
                                            <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter password">
                                        </div>                               
                                    </div><!--end form-group--> 

                                    <div class="form-group">
                                        <label for="conf_password">Confirm Password</label>                                            
                                        <div class="input-group mb-3"> 
                                            <span class="auth-form-icon">
                                                <i class="dripicons-lock-open"></i> 
                                            </span>                                                       
                                            <input type="password" name="password_confirm" class="form-control" id="conf_password" placeholder="Enter Confirm Password">
                                        </div>  
                                        
                                        {{-- <div class="form-group">
                                            <label for="mo_number">Mobile Number</label>                                            
                                            <div class="input-group mb-3"> 
                                                <span class="auth-form-icon">
                                                    <i class="dripicons-phone"></i> 
                                                </span>                                                       
                                                <input type="text" class="form-control" id="mo_number" placeholder="Enter Mobile Number">
                                            </div>                               
                                        </div><!--end form-group-->  --}}
                                    </div><!--end form-group--> 
        
                                    <div class="form-group row mt-4">
                                        <div class="col-sm-12">
                                            <div class="custom-control custom-switch switch-success">
                                                <input type="checkbox" class="custom-control-input" id="customSwitchSuccess">
                                                <label class="custom-control-label text-muted" for="customSwitchSuccess">By registering you agree to the <a href="#" class="text-primary">Terms of Use</a></label>
                                            </div>
                                        </div><!--end col-->                                             
                                    </div><!--end form-group--> 
        
                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" id="registerBtn" type="button">Register <i class="fas fa-sign-in-alt ml-1"></i></button>
                                        </div><!--end col--> 
                                    </div> <!--end form-group-->                           
                                </form><!--end form-->
                            </div><!--end /div-->
                            
                            <div class="m-3 text-center text-muted">
                                <p class="">Already have an account ? <a href="{{route('toLoginPage')}}" class="text-primary ml-2">Log in</a></p>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                </div><!--end auth-card-->
            </div><!--end col-->           
        </div><!--end row-->
    </div><!--end container-->
    <button class="btn btn-primary" id="pay-button">Pay Now</button>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script>
        const payButton = document.querySelector('#pay-button');
        payButton.addEventListener('click', function(e) {
            window.location.href = "{{$snapToken}}"
        });
        
        $("#registerBtn").click(function(){
            if($('#customSwitchSuccess').is(':checked')){
                
                $("#registerForm").submit();
            }
        });
    </script>
</div>
