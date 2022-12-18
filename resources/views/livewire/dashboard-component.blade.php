<div>
    <div class="col-12 mt-3">
        <div class="card">
            <div class="card-body d-flex flex-column">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-3">
                        <div class="card report-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-dark font-weight-semibold font-14">Number of users</p>
                                        <h3 class="my-3">{{$userCount}}</h3>
                                        
                                    </div>
                                    <div class="align-self-center">
                                        <i class="dripicons-user-group report-main-icon bg-soft-purple text-purple"></i>
                                    </div>
                                </div>
                            </div><!--end card-body--> 
                        </div><!--end card--> 
                    </div> <!--end col--> 
                    <div class="col-md-6 col-lg-3">
                        <div class="card report-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">                                                
                                    <div>
                                        <p class="text-dark font-weight-semibold font-14">Total active user today</p>
                                        <h3 class="my-3">{{$totalUserActive}}</h3>
                             
                                    </div>
                                    <div class="align-self-center">
                                        <i class="dripicons-clock report-main-icon bg-soft-danger text-danger"></i>
                                    </div> 
                                </div>
                            </div><!--end card-body--> 
                        </div><!--end card--> 
                    </div> <!--end col--> 
                    <div class="col-md-6 col-lg-3">
                        <div class="card report-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">                                                
                                    <div>
                                        <p class="text-dark font-weight-semibold font-14">Revenue this month</p>
                                        <h3 class="my-3">{{number_format($revenueThisMonth,2)}}</h3>
                                    </div>
                                    <div  class="align-self-center">
                                        <i class="dripicons-meter report-main-icon bg-soft-secondary text-secondary"></i>
                                    </div> 
                                </div>
                            </div><!--end card-body--> 
                        </div><!--end card--> 
                    </div> <!--end col--> 
                    <div class="col-md-6 col-lg-3">
                        <div class="card report-card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="text-dark font-weight-semibold font-14">Total product</p>
                                        <h3 class="my-3">{{$totalProduct}}</h3>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="dripicons-store    report-main-icon bg-soft-warning text-warning"></i>
                                    </div> 
                                </div>
                            </div><!--end card-body--> 
                        </div><!--end card--> 
                    </div> <!--end col-->                               
                </div><!--end row--> 
                <div class="col-12 d-flex">
                    @foreach ($chart as $chrt)
                    <div class="col-6">
                        {!! $chrt->renderHtml() !!}
                    </div>
                        
                    @endforeach
                    
                </div>
    
            </div>
        </div>
    </div>   
    @foreach ($chart as $chrt)
        {!! $chrt->renderChartJsLibrary() !!}
        {!! $chrt->renderJs() !!}
        
    @endforeach
        
</div>
