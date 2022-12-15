<div>
    <div class="shop-main__items">
        @if(count($products) > 0)
        @foreach ($products as $product)
            <a href="#" onclick="return false;" style="color: white;" class="products-item" wire:click="contactproduct('{{$product->name}}')">
                <div class="products-item__img">
                    <img src="img/momo_product/{{$product->image_product}}" class="js-img" alt="" >
                    <div class="products-item__hover">
                        
                    </div>
                </div>
                <div class="products-item__info">
                    @php($productName = "")

                    @if(Session()->get('applocale') == "cn")
                        @php($productName = $this->translateKeChina($product->name))
                    @elseif(Session()->get('applocale') == "en")
                        @php($productName = $this->translateKeInggris($product->name))
                    @else
                        @php($productName = $product->name)
                    @endif
                    <span class="products-item__name text-decoration-none">{{$productName}}</span>
                    <span class="products-item__cost text-decoration-none">Rp {{$product->price}}</span>
                </div>
            </a>
        @endforeach
        @else
            <div class="w-100 d-flex justify-content-center align-items-center" style="height: 50vh;">
                <h1>{{__('Product Tidak Ditemukan')}}</h1>
            </div>
        @endif
        
    </div>

        
        {{ $products->links() }}
        
   
</div>
</div>
</div>
</div>


