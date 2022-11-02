<div>

    <section class="trending">
        <div class="trending-content">
            <div class="trending-top">
                <span class="saint-text">Cosmetics</span>
                <h2>Trending products</h2>
                <p>Nourish your skin with toxin-free cosmetic products. With the offers that you can’t refuse.
                </p>
            </div>
            
            
            <div class="tab-wrap trending-tabs">
                <ul class="nav-tab-list tabs">
                    @foreach ($allKategori as $kategori)
                    <li class="{{$curKategori == $kategori->id ? 'active' : ''}} ">
                       
                        <a href="#trending-tab_1" wire:click="setKategori('{{$kategori->id}}')">{{__($kategori->category_general)}}</a>
                    </li>
                    @endforeach
                    
                    
                </ul>
            
                <div class="box-tab-cont" >
                    <div class="tab-cont" id="trending-tab_1">
                        <div class="products-items js-products-items" >
                        @foreach ($curProducts as $product)
                            
                                <a href="#" class="products-item">
                                
                                    <div class="products-item__img">
                                        <img 
                                            src="img/momo_product/{{$product->image_product}}" class="js-img" alt="">
                                        <div class="products-item__hover">
                                            <i class="icon-search"></i>
                                        </div>
                                    </div>
                                    <div class="products-item__info">
                                        <span class="products-item__name">{{__($product->name)}}</span>
                                        <span class="products-item__cost">Rp {{$product->price}}</span>
                                    </div>
                                </a>
                           
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
 
</div>


