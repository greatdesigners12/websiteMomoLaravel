            
<div class="col-12 mt-3">
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">Create Product</h4>
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
            <form method="POST" action="{{route('processCreateProduct')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">Product Name</label>
                    @if($curProduct != null)
                        @php(dd($curProduct->name))
                    @endif
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{$curProduct == null ? '' : $curProduct->name}}"  name="name" placeholder="Enter product name">
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Description</label>
                    <textarea class="form-control" name="description" rows="5" id="message"></textarea>
                    
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div class="form-group">
                    <label class="mb-3">Category</label>
                    <select class="select2 form-control mb-2 custom-select" name="category_id"  style="width: 100%; height:36px;">
                        <option>Select</option>
                    
                        @foreach ($categories as $category)
                            
                            <option value="{{$category['id']}}">{{$category['category_general']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="mb-3">Brand</label>
                    <select class="select2 form-control mb-2 custom-select"  name="company_id" style="width: 100%; height:36px;">
                        <option>Select</option>
                        @foreach ($brands as $brand)
                            <option value="{{$brand['id']}}">{{$brand['company_name']}}</option>
                        @endforeach
                        
                    
                    </select>
                </div>          
                <div class="form-group">
                    <label for="example-input3-group1">Price</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="text"  id="example-input3-group1" name="price" class="form-control" placeholder=".."  >
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>                                                    
                    </div>                                                    
                </div>
                <div class="form-group">
                    <label for="example-input3-group1">Stocks</label>
                    <input type="number" class="form-control" name="stock" placeholder="Enter product stock"  >                                                  
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Gambar Produk</label>
                    <div class="col-12 mb-3">
                        
                    
                        <input type="file" id="input-file-now" class="dropify" name="image_product" />                                                   
                                                                        
                </div>
                <button type="submit" class="btn btn-gradient-primary">Submit</button>
    
        </form>                                           
    </div><!--end card-body-->
    <!--end card-->
        
    <script src="plugins/dropify/js/dropify.min.js"></script>
    <script src="helpers/jquery.form-upload.init.js"></script>
    
    
    
    