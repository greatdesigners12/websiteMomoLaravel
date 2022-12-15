<div>
    <main class="content">
        <!-- BEGIN DETAIL MAIN BLOCK -->
        <div class="detail-block detail-block_margin">
            <div class="wrapper">
                <div class="detail-block__content">
                    <h1>{{__('Product')}}</h1>
                    <ul class="bread-crumbs" style="padding-left:0;">
                        <li class="bread-crumbs__item">
                            <a href="/" class="bread-crumbs__link">{{__('Beranda')}}</a>
                        </li>
                        <li class="bread-crumbs__item">{{__('Product')}}</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- DETAIL MAIN BLOCK EOF   -->
        <!-- BEGIN SHOP -->
        <div class="shop">
            <div class="wrapper">
                <div class="shop-content">
                    <div class="shop-aside">
                        <div class="box-field box-field__search">
                            <input wire:model="search" wire:keydown="search" type="search" class="form-control" placeholder="{{__('Cari')}}">
                            <i class="icon-search"></i>
                        </div>
                        <div class="shop-aside__item">
                            <span class="shop-aside__item-title">{{__('Category')}}</span>
                            <ul>
                                <li><a href="#" class="{{$curCategory == 'semua' ? 'active' : ''}}" onclick="return false;" wire:click="setCategory('semua')">{{__('Semua')}} </a></li>
                                @foreach ($categories as $category)
                                    <li><a href="#" onclick="return false;" class="{{$curCategory == $category->id ? 'active' : ''}}"  wire:click="setCategory('{{$category->id}}')">{{__($category->name)}} </a></li>
                                @endforeach
                                
                            </ul>
                        </div>
                        <div class="shop-aside__item">
                            <span class="shop-aside__item-title">{{__('Harga')}}</span>
                            <div >
                                <div class="input-group mb-3">
                                    <span class="input-group-text text-white" style="line-height: 1; background-color:#DB74A1;">Rp. </span>
                                    <input type="text" class="form-control" wire:model="min" placeholder="{{__('Minimum Harga')}}" aria-label="Username" aria-describedby="basic-addon1">
                                  </div>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text text-white" style="line-height: 1; background-color:#DB74A1;">Rp. </span>
                                    <input type="text" class="form-control" wire:model="max" placeholder="{{__('Maksimum Harga')}}" aria-label="Username" aria-describedby="basic-addon1">
                                  </div>
                                                                    
                                
                                <button class="btn-filter" style="background-color: #DB74A1" wire:click="setPriceRange">{{__('Filter')}}</button>
                            </div>
                        </div>
                        <div class="shop-aside__item">
                            
                           
                          
                           
                        </div>
                    </div>
                    <div class="shop-main">
                        <div class="shop-main__filter">
                            
                            <div class="shop-main__select">
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" wire:click="setPriceSort" wire:model="priceSort">
                                    <option selected value="lh">{{__('Urutkan Harga Terendah')}}</option>
                                    <option value="hl">{{__('Urutkan Harga Tertinggi')}}</option>
                                    
                                  </select>
                            </div>
                        </div>
                <livewire:product-list />      
                
        </div>
       
    
    
    </main>
</div>

<script>
    
    
    
</script>
