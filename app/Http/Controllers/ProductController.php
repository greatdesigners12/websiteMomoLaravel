<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 



class ProductController extends Controller
{
    static function getAllProducts(){
        return Product::all();
    }

    static function getHighestPrice(){
        return Product::max("price");
    }

    static function getLowestPrice(){
        return Product::min("price");
    }

    static function getProductsBasedOnCategoryId($id){
        return Product::where("category_id", $id)->limit(5)->get();
    }

    static function getProductWithPagination($limit){
        return Product::paginate($limit);
    }

    function createProduct(Request $request){
        $rules = ['name' => 'required', 'description' => "required", 'category_id' => "required|integer", 'company_id' => "required|integer", 'price' => "required|integer", 'stock' => "required|integer", 'image_product' => 'required'];
        $messages = ["required" => "Input :attribute tidak boleh kosong", "integer" => "Input :attribute harus angka"];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $validated = $validator->validated();
            
            $imageName = time().'.'.$request->image_product->extension(); 
            $request->image_product->move(public_path('img/momo_product/'), $imageName);
            $validated['image_product'] = $imageName;
            Product::create($validated);
            return redirect()->back()->with("message", "Product has been inserted");
        }
    }

    function updateProduct(Request $request){
        $rules = ['id' => 'required' ,'name' => 'required', 'description' => "required", 'category_id' => "required|integer", 'company_id' => "required|integer", 'price' => "required", 'stock' => "required|integer"];
        $messages = ["required" => "Input :attribute tidak boleh kosong", "integer" => "Input :attribute harus angka"];
        $validator = Validator::make($request->all(), $rules, $messages);
        $validated = $validator->validated();
        $firstImg = Product::select('image_product')->find($validated['id']);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            if($request->image_product != null){
                if (File::exists(public_path('img/momo_product/' . $firstImg['image_product']))) {
                    File::delete(public_path('img/momo_product/' . $firstImg['image_product']));
                }
                $imageName = time().'.'.$request->image_product->extension(); 
                $request->image_product->move(public_path('img/momo_product/'), $imageName);
                $validated['image_product'] = $imageName;
            }else{
                $validated['image_product'] = $firstImg["image_product"];
            }
          
          
             $validated['price'] = str_replace('.', '', $validated['price']);
            
            Product::where('id', $validated['id'])->update($validated);
            return redirect()->route('toProductManagementPage')->with("message", "Product has been updated");
        }
    }

}
