            
<div class="col-12 mt-3">
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">Create product</h4>
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
<<<<<<< HEAD
            <form method="POST" action="{{$product == null ? route('processCreateProduct') : route('processUpdateProduct')}}" enctype="multipart/form-data">
=======
            <form method="POST" action="{{route('processCreateproduct')}}" enctype="multipart/form-data">
>>>>>>> origin/database
                @csrf
                <input type="hidden" name="id" value="{{$product == null ? '' : $product->id}}">
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">product Name</label>
                 
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{$product == null ? '' : $product->name}}" name="name" placeholder="Enter product name">
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group">
<<<<<<< HEAD
                    <label for="exampleInputEmail1">Product Description</label>
                    <textarea class="form-control" wire:model.defer="description" name="description" rows="5" id="message" wire:model='description'></textarea>
=======
                    <label for="exampleInputEmail1">product Description</label>
                    <textarea class="form-control" wire:model="description" name="description" rows="5" id="message">{{$product == null ? '' : $product->description}}</textarea>
>>>>>>> origin/database
                    
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group">
                    <label class="mb-3">Category</label>
                    <select class="select2 form-control mb-2 custom-select"  name="category_id"  style="width: 100%; height:36px;">
                        <option>Select</option>
                    
                        @foreach ($categories as $category)
                            
                            <option value="{{$category['id']}}" {{$category->id == $product->category_id ? 'selected' : ''}} >{{$category['category_general']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="mb-3">Brand</label>
<<<<<<< HEAD
                    <select class="select2 form-control mb-2 custom-select" wire:model.defer='company_id' name="company_id"  style="width: 100%; height:36px;">
                        <option>Select</option>
                        @foreach ($brands as $brand)
                            <option value="{{$brand['id']}}" {{$brand->id == $product->company_id ? 'selected' : ''}}>{{$brand['company_name']}}</option>
=======
                    <select class="select2 form-control mb-2 custom-select" value="{{$product == null ? '' : $product->brand_id}}"  name="id" style="width: 100%; height:36px;">
                        <option>Select</option>
                        @foreach ($brands as $brand)
                            @if ($brand['id']!=1)
                            <option value="{{$brand['id']}}">{{$brand['logo']}}</option>
                            @endif
                            
>>>>>>> origin/database
                        @endforeach
                        
                    
                    </select>
                </div>          
               
                <x-inputs.currency
                    label="Price"
                    placeholder="Input Price"
                    name="price"
                    thousands="."
                    decimal=","
                    precision="4"
                    wire:model.defer="price"

                />
                <div class="form-group mt-3">
                    <label for="example-input3-group1" class="font-weight-bold">Stocks</label>
                    <input type="number" class="form-control" name="stock" value="{{$product == null ? '' : $product->stock}}" placeholder="Enter product stock"  >                                                  
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Gambar Product</label>
                    <div class="col-12 mb-3">
                        <input type="file" id="input-file-now" class="dropify" name="image_product" data-default-file="{{ URL::to('/') }}/img/momo_product/{{$product->image_product}}"/>                                                                              
                </div>
               
                <button type="submit" class="btn btn-gradient-primary">Submit</button>
                
                
    
        </form>                                           
    </div><!--end card-body-->
    <!--end card-->
    
        
    
    
    
    