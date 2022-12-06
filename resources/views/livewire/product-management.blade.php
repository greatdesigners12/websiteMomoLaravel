<div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Default Datatable</h4>
                <p class="text-muted mb-3">DataTables has most features enabled by
                    default, so all you need to do to use it with your own tables is to call
                    the construction function: <code>$().DataTable();</code>.
                </p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>NAMA</th>
                        <th>PRICE</th>
                        <th>STOCK</th>
                        <th>CATEGORY</th>
                       
                        <th>ACTION</th>
                    </tr>
                    </thead>


                    <tbody>
                    
                    @foreach ($products as $product)
                  
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->category_general}}</td>
                        <td>
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".editForm" onclick="setId('{{$product->id}}')" wire:ignore.self>EDIT</button>
                            <button class="btn btn-danger">DELETE</button>
                        </td>
                    </tr>
                    @endforeach
                 
                    </tbody>
                </table>
                
                    <div class="modal fade editForm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Large modal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <h1>Hello world</h1>
                                    
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                
                
            </div>
        </div>
    </div> <!-- end col -->
    <script>

    Livewire.on('setValue', data => {

     

    });

    function setId(a){
        Livewire.emit('setId', a)
    }

    </script>
</div>
