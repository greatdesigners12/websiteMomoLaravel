<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function getAllProducts(){
        return Product::all();
    }

    static function getProductsBasedOnCategoryId($id){
        return Product::where("cpid", $id)->get();
    }

}
