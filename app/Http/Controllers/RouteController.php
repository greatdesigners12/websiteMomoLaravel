<?php

namespace App\Http\Controllers;

use App\Mail\StoreEmailSender;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RouteController extends Controller
{

    public function toHomePage(){
        $products = DB::table('products')->leftJoin("favourite_products", function ($join) {
            $join->on('products.id', '=', 'favourite_products.product_id')
                 ->where('favourite_products.user_id', '=', Auth::id());
        })->select('products.*', 'favourite_products.user_id')->where('category_id', 1)->limit(5)->get();
       
        return view("welcome", ["allCategory" => Category::all(), "curProducts" => $products, "brands" => Brand::all()]);
    }

    public function toProductsPage(){
        return view("productList", ["categories" => Category::all()]);
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

    public function toEditProductPage($id){
        $product = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin-page.product-management.edit-product', ["product" => $product, "categories" => $categories, "brands" => $brands]);
    }

    public function toProductsManagementPage(){
       
    
        return view('admin-page.product-management.product-management');
    }

    public function toCreateproductPage(){
        
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin-page.product-management.create-product', ["categories" => $categories, "brands" => $brands]);
    }

    public function toCartPage(){
        return view('transactions.cart');
    }

    public function toProtectedPage(){
        return view('protectedPage');
    }

    public function toDashboardPage(){
        return view('admin-page.dashboard');
    }

    public function toBrandsManagementPage(){
        return view('admin-page.brand-management.brand-management');
    }

    public function toCategoriesManagementPage(){
        return view('admin-page.category-management.category-management');
    }

    public function toOtpVerificationPage($token){
        
        return view('auth.otpVerificationPage', ["token" => $token]);
    }

    public function toValidatePhoneNumber(){
        $hasPhoneNumber = true;
        if(Auth::check()){
            $user = User::find(Auth::id());
            $hasPhoneNumber = $user->is_phone_verified == 1;
        }
        return view('auth.phoneNumberForm', ["hasPhoneNumber" => $hasPhoneNumber]);
    }
}
