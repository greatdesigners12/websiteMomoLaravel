<div>
    <section class="brand-area">
        <div class="container">
            <div class="sec-title">
                <h1>{{__('Partner Kami')}}</h1>
                <span class="border" style="opacity: 0%;"></span>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="brand">
                        <!--Start single item-->
                        @foreach($brands as $brand)
                            <div class="tool_tip " title="Media Partner"  style=".tool_tip:hover {cursor: default;}">
                                <div class="single-item">
                                    <img src="{{asset('storage/img/momo_partner/') . '/' . $brand->logo}}" style='height: 100%; width: 100%; object-fit: contain'  alt="Awesome Brand Image">
                                </div>
                            </div>
                        @endforeach
                        
                        <!--End single item-->
                       
                </div>
            </div>
        </div>
    </section>
</div>
