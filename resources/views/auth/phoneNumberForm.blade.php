@extends('auth.template')



@section('content')
<div>
    <div class="container">
        <div class="row vh-100 vw-100">
            <div class="col-12 align-self-center">
                <div class="auth-page">
                    <div class="card auth-card shadow-lg">
                        <div class="card-body">
                            <div class="px-3">
                                <div class="auth-logo-box d-flex justify-content-center">
                                    <a href="{{route('home')}}" class="logo logo-admin"><img src="{{asset('storage/img/logo.png')}}" style="width: 70px;" alt="logo" class="auth-logo"></a>
                                </div><!--end auth-logo-box-->
                                @if (Auth::check() && !$hasPhoneNumber)
                                <div class="text-center auth-logo-text">
                                    <h4 class="mt-0 mb-3 mt-5">Phone Verification</h4>
                                    <p class="text-muted mb-0">Verify your phone number to continue</p>  
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
                                
                                <form class="form-horizontal auth-form my-4" method="POST" action="{{route('processPhoneNumber')}}">
                                    @csrf
                                   
                                    <div class="box-field__row">
                                        <div class="box-field">
                                            <input type="tel" class="form-control" name="phoneNumber" placeholder="Enter your phone">
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit">Verify <i class="fas fa-sign-in-alt ml-1"></i></button>
                                        </div><!--end col--> 
                                    </div> <!--end form-group-->                           
                                </form><!--end form-->
                                @else
                                <div class="text-center auth-logo-text">
                                    <h4 class="mt-0 mb-3 mt-5">EXPIRED</h4>
                                    <p class="text-muted mb-0">Try to login from <a href="{{route('toLoginPage')}}">link</a> or register here <a href="{{route('toRegisterPage')}}">link</a></p>  
                                </div> <!--end auth-logo-text-->  
                                @endif
                               
                            </div><!--end /div-->
                            
                           
                        </div><!--end card-body-->
                    </div><!--end card-->
                    
                </div><!--end auth-page-->
            </div><!--end col-->           
        </div><!--end row-->
    </div><!--end container-->
</div>

@endsection