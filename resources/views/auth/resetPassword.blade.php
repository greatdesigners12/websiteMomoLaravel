@extends('auth.template')

@section('content')
    
    <div class="container">
        <div class="row vh-100 vw-100">
            <div class="col-12 align-self-center">
                <div class="auth-page">
                    @if ($status == 'verified')
                    <div class="card auth-card shadow-lg">
                        <div class="card-body">
                            <div class="px-3">
                                <div class="auth-logo-box">
                                    <a href="../dashboard/analytics-index.html" class="logo logo-admin"><img src="../assets/images/logo-sm.png" height="55" alt="logo" class="auth-logo"></a>
                                </div><!--end auth-logo-box-->
                                
                                <div class="text-center auth-logo-text">
                                    <h4 class="mt-0 mb-3 mt-5">Reset Password</h4>
                                    <p class="text-muted mb-0">You can reset the password by registering new password</p>  
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
                                
                            <form class="form-horizontal auth-form my-4" action="{{route('processResetPassword')}}" method="POST">
    
                                @csrf
                                <input type="hidden" name="id" value="{{$_GET['id']}}">
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
                                    
                                  
                                </div><!--end form-group--> 
    
                               
                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit">Reset Password <i class="fas fa-sign-in-alt ml-1"></i></button>
                                    </div><!--end col--> 
                                </div> <!--end form-group-->                           
                            </form><!--end form-->
                        </div><!--end /div-->
                        @else
                            <h1>Expired or Invalid token</h1>
                        @endif
                        
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end auth-card-->
        </div><!--end col-->           
    </div><!--end row-->
   
    
</div><!--end container-->
@endsection