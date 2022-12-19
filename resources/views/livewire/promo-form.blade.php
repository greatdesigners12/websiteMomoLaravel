            
<div class="col-12 mt-3">
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">Buat Promo</h4>
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
            
            <form method="POST" action="{{$promo == null ? route('processCreatepromo') : route('processUpdatepromo')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$promo == null ? '' : $promo->id}}">
                <div class="form-group mt-3">
                    <label for="exampleInputEmail1">{{ "Kode Promo" }}</label>
                 
                    <input type="text" class="form-control" id="exampleInputEmail1" value="{{$promo == null ? '' : $promo->code}}" name="code" placeholder="Enter product name">
                    {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                </div>
                <div id="percentage">
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">{{ "Persentase Diskon" }}</label>
                    
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$promo == null ? '' : $promo->percentage}}" name="percentage" placeholder="Masukkan persentase diskon">
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">{{ "Maksimum Diskon" }}</label>
                    
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{$promo == null ? '' : $promo->max_discount}}" name="max_discount" placeholder="Masukkan maksimum diskon">
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                </div>
                <div class="form-group">
                    <label class="mb-3">{{ "Status Code" }}</label>
                    <select class="select2 form-control mb-2 custom-select"  value="{{$promo == null ? '' : $promo->status}}" name="status"  style="width: 100%; height:36px;">
                        <option value="1"<?=($promo == null ? '' : $promo->status) == 1 ? ' selected="selected"' : '';?>>{{ "Aktif" }}</option>
                        <option value="0" <?=($promo == null ? '' : $promo->status) == 0 ? ' selected="selected"' : '';?>>{{ "Non-Aktif" }}</option>
                    
                       
                    </select>
                </div>



                                         
               
                <button type="submit" class="btn btn-gradient-primary">{{ "Kirim" }}</button>
                
                
    
        </form>  
                                              
    </div><!--end card-body-->
    <!--end card-->
    <script>
    $('document').ready(function(){
        $(.promo_type).change(function()){
           $('#fixed', '#percentage').hide();
            $('#' + $(this).val()).show();
        }
    })
    </script>
        
    <script src="plugins/dropify/js/dropify.min.js"></script>
    <script src="helpers/jquery.form-upload.init.js"></script>
    
    
    
    