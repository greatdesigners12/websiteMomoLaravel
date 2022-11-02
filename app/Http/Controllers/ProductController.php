<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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

}
