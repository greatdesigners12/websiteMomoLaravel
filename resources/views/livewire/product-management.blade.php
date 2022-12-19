<div>
    
    <div class="col-12">
        
        <div class="card mt-3">
            <div class="card-body">

                <h4 class="mt-0 header-title">Table Product</h4>
                <p class="text-muted mb-3">All about management the product</code>.
                </p>
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
                <livewire:product-table />
                <x-dialog />
                
            </div>
        </div>
    </div> <!-- end col -->
    
 
    



    <script>
      
       
    </script>
</div>
