<div>

    <section class="trending">
        <div class="trending-content">
            <div class="trending-top">
                <span class="saint-text">{{__('Aksesoris Dan Kosmetik')}}</span>
                <h2>{{__('Produk Pilihan')}}</h2>
                <p>{{__('Percantik diri kalian dengan pilihan produk yang menarik dan berkualitas')}}</p>
            </div>
            
            
            <div class="tab-wrap trending-tabs">
                <ul class="nav-tab-list tabs">
                    @foreach ($allCategory as $Category)
                    <li class="{{$curCategory == $Category->id ? 'active' : ''}} ">
                       
                        <a href="#trending-tab_1" wire:click="setCategory('{{$Category->id}}')">{{__($Category->category)}}</a>
                    </li>
                    @endforeach
                    
                    
                </ul>
            
                <div class="box-tab-cont" >
                    <div class="tab-cont" id="trending-tab_1">
                        <div class="products-items js-products-items" >
                        @foreach ($curProducts as $product)
                            
                                <a href="#" class="products-item" style="color:white;">
                                
                                    <div class="products-item__img">
                                        <img 
                                            src="{{asset('storage/img/momo_product/').'/' . $product->image_product}}" class="js-img" alt="">
                                        <div class="products-item__hover">
                                           
                                        </div>
                                    </div>
                                    @php($productName = "")

                                    @if(Session()->get('applocale') == "cn")
                                        @php($productName = $this->translateKeChina($product->name))
                                    @elseif(Session()->get('applocale') == "en")
                                        @php($productName = $this->translateKeInggris($product->name))
                                    @else
                                        @php($productName = $product->name)
                                    @endif
                                    <div class="products-item__info">
                                        <span class="products-item__name">{{$productName}}</span>
                                        <span class="products-item__cost">Rp {{$product->price}}</span>
                                    </div>
                                </a>
                           
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>
    
 
</div>


