<div>
    <section class="brand-area">
        <div class="container">
            <div class="sec-title">
                <h1>Our Partners</h1>
                <span class="border"></span>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="brand">
                        <!--Start single item-->
                        @foreach($brands as $brand)
                            <a class="tool_tip" title="Media Partner" href="#">
                                <div class="single-item">
                                    <img src="img/momo_partner/{{$brand->company_logo}}" style='height: 100%; width: 100%; object-fit: contain'  alt="Awesome Brand Image">
                                </div>
                            </a>
                        @endforeach
                        
                        <!--End single item-->
                       
                </div>
            </div>
        </div>
    </section>
</div>
