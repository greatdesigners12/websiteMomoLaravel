<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Validator;

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
        $rules = ['name' => 'required', 'description' => "required", 'category_id' => "required|integer", 'brand_id' => "required|integer", 'price' => "required|integer", 'stock' => "required|integer", 'image_product' => 'required'];
        $messages = ["required" => "Input :attribute tidak boleh kosong", "integer" => "Input :attribute harus angka"];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $validated = $validator->validated();
        
            $imageName = time().'.'.$request->image_product->extension(); 
            $request->image_product->move(public_path('img'), $imageName);
            $validated['image_product'] = $imageName;
            product::create($validated);
            return redirect()->back()->with("message", "product has been inserted");
        }
    }

}
