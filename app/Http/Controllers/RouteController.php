<?php

namespace App\Http\Controllers;

use App\Mail\StoreEmailSender;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class RouteController extends Controller
{
    public function toHomePage(){
        return view("welcome", ["allKategori" => Kategori::all(), "curProducts" => ProductController::getProductsBasedOnCategoryId("1"), "brands" => Brand::all()]);
    }

    public function toProductsPage(){
        return view("productList", ["categories" => Kategori::all()]);
    }
    public function toContactPage(){
        return view("ContactUs");
    }

    public function toAddBookPage(){
        return view("createBook");
    }

    public function toSendEmailPage(){
        return view("SendMail");
    }

    public function toLoginPage(){
        return view("login");
    }

    public function toRegisterPage(){
        return view("register");
    }

    public function toVerificationPage(Request $request){
        $user = User::where("id", $request->query("id"))->where("token", $request->query("token"))->first();
        $status = "verified";
        if($user == null){
            $status = "Not Found";
        }

        return view('verificationPage', ["status" => $status]);
        
    }
}
