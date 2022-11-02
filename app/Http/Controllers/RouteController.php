<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Kategori;


class RouteController extends Controller
{
    public function toHomePage(){
        return view("welcome", ["allKategori" => Kategori::all(), "curProducts" => ProductController::getProductsBasedOnCategoryId("1"), "brands" => Brand::all()]);
    }
}