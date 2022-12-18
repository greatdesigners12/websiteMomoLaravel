<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 



class ProductController extends Controller
{
    static function getAllproducts(){
        return product::all();
    
    }

    static function getHighestPrice(){
        return product::max("price");
    }

    static function getLowestPrice(){
        return product::min("price");
    }

    static function getproductsBasedOnCategoryId($id){
        return product::where("category_id", $id)->limit(5)->get();
    }

    static function getproductWithPagination($limit){
        return product::paginate($limit);
    }

    function createproduct(Request $request){
        
        $rules = ['name' => 'required', 'description' => "required", 'category_id' => "required|integer", 'brand_id' => "required|integer", 'price' => "required", 'stock' => "required|integer", 'image_product' => 'required'];
        $messages = ["required" => "Input :attribute tidak boleh kosong", "integer" => "Input :attribute harus angka"];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $validated = $validator->validated();
            $imageName = time().'.'.$request->image_product->extension(); 
            $validated["price"] = str_replace('.', '', $validated["price"]);
            $request->image_product->storeAs('img/momo_product/', $imageName, 'public');
            $validated['image_product'] = $imageName;
            
            product::create($validated);
            return redirect()->back()->with("message", "product has been inserted");
        }
    }

    function updateProduct(Request $request){
        $rules = ['id' => 'required' ,'name' => 'required', 'description' => "required", 'category_id' => "required|integer", 'brand_id' => "required|integer", 'price' => "required", 'stock' => "required|integer"];
        $messages = ["required" => "Input :attribute tidak boleh kosong", "integer" => "Input :attribute harus angka"];
        $validator = Validator::make($request->all(), $rules, $messages);
        $validated = $validator->validated();
        $firstImg = Product::select('image_product')->find($validated['id']);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            if($request->image_product != null){
                
                if (Storage::disk('public')->exists("img/momo_product/" . $firstImg['image_product'])) {
                
                    Storage::disk('public')->delete("img/momo_product/" . $firstImg['image_product']);
                }
                $imageName = time().'.'.$request->image_product->extension(); 
                $request->image_product->storeAs("img/momo_product/", $imageName, "public");
                $validated['image_product'] = $imageName;
            }else{
                $validated['image_product'] = $firstImg["image_product"];
            }
          
          
             $validated['price'] = str_replace('.', '', $validated['price']);
            
            Product::where('id', $validated['id'])->update($validated);
            return redirect()->route('toProductsManagementPage')->with("message", "Product has been updated");
        }
    }

    public function getProductById($id){
        $product = Product::find($id);
        return view("detail-product", ["product" => $product]);

    }

    

}
