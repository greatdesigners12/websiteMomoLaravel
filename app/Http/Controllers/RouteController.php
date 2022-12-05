<?php

namespace App\Http\Controllers;

use App\Mail\StoreEmailSender;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Services\Midtrans\CreateSnapTokenService;

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
        return view("auth.login");
    }

    public function toRegisterPage(){
        
        $transaction = Transaction::first();
        $url = "";
        if($transaction != null){
            $url = $transaction->snap_token;
            if (empty($snapToken)) {
                // Jika snap token masih NULL, buat token snap dan simpan ke database
    
                $midtrans = new CreateSnapTokenService($transaction);
                $url = $midtrans->getSnapToken();
    
                // $transaction->snap_token = $snapToken;
                // $transaction->save();
            }
        }
        
        return view("auth.register", ["url" => $url]);
    }

    public function toVerificationPage(Request $request){
        $user = User::where("id", $request->query("id"))->where("token", $request->query("token"))->first();
        $status = "verified";
        if($user == null){
            $status = "Not Found";
        }

        return view('auth.verificationPage', ["status" => $status]);
        
    }

    public function toWishListPage(){
        return view('user-page.wishlist');
    }

    public function toProductManagementPage(){
        return view('admin-page.product-management');
    }

    public function toCartPage(){
        return view('transactions.cart');
    }

    public function toProtectedPage(){
        return view('protectedPage');
    }
}
