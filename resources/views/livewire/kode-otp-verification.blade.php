<div>
    
    <div class="container">
        <div class="row vh-100 vw-100">
            <div class="col-12 align-self-center">
                <div class="auth-page">
                    <div class="card auth-card shadow-lg">
                        <div class="card-body">
                            <div class="px-3">
                                <div class="auth-logo-box d-flex justify-content-center">
                                    <a href="#" class="logo logo-admin"><img src="{{asset('storage/img/logo.png')}}" height="55" alt="logo" style="width: 70px;" class="auth-logo"></a>
                                </div><!--end auth-logo-box-->
                                @if ($display)
                                    <div class="text-center auth-logo-text">
                                        <h4 class="mt-0 mb-3 mt-5">Please enter the one time password <br> to verify your account</h4>
                                        <p class="text-muted mb-0"><span>A code has been sent to </span> <small>{{$phoneNumber}}</small></p>  
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
                                    <x-dialog />
                                    @if ($timerVisible)
                                        <div wire:poll.visible.keep-alive.1000ms='countdown'>

                                            Current time: {{$currentMinutes < 10 ? "0" . $currentMinutes : $currentMinutes }} : {{$currentSeconds < 10 ? "0" . $currentSeconds : $currentSeconds}}
                                        
                                        </div>
                                    @endif
                                    
                                    
                                    <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> <input class="m-2 text-center form-control rounded" type="text" id="first" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="second" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="third" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="fourth" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="fifth" maxlength="1" /> <input class="m-2 text-center form-control rounded" type="text" id="sixth" maxlength="1" /> </div>
                                    <div class="mt-2 d-flex justify-content-center"> <button class="btn btn-primary px-4 validate" id="validateBtn">Validate</button> </div>
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
    <script src="{{asset('js/otpVerification.js')}}">

   


</div>
