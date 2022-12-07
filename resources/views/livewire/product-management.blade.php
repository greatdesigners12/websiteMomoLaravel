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
                            <button type="button" class="btn btn-primary waves-effect waves-light" wire:click="openModal('{{$product->id}}')">EDIT</button>
                            <button class="btn btn-danger">DELETE</button>
                        </td>
                    </tr>
                    @endforeach
                 
                    </tbody>
                </table>
                <div >
                    <x-modal wire:model.defer="simpleModal" x-on:close="$wire.call('closeModal')" >

                        <x-card title="Update Product">
                    
                            <p class="text-gray-600">
                                <div style='width: 100%; height:600px; overflow:scroll;'>
                                    @include('admin-page.form.productForm')
                                </div>
                            </p>          
                            <x-slot name="footer">
                    
                                <button type="submit" class="btn btn-gradient-primary">Submit</button>
                    
                            </x-slot>
                    
                        </x-card>
                    
                    </x-modal>
                </div>
                
                <script>
                    document.addEventListener("livewire:load", function(event) {
                        console.log("brioawdaw");
                    });
                </script>
               
                
                
                
                
            </div>
        </div>
    </div> <!-- end col -->
 
   
</div>
