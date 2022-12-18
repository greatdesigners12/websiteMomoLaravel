<?php

namespace App\Http\Controllers;

use App\Mail\StoreEmailSender;
use App\Models\Announcement;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\product;
use App\Models\Promo;
use App\Models\roles;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Services\Midtrans\CreateSnapTokenService;


class RouteController extends Controller
{
    public function toHomePage(){
        return view("welcome", ["allCategory" => Category::all(), "curproducts" => ProductController::getproductsBasedOnCategoryId("1"), "brands" => Brand::all()]);
    }

    public function toproductsPage(){
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

    public function toEditproductPage($id){
        $product = product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin-page.product-management.edit-product', ["product" => $product, "categories" => $categories, "brands" => $brands]);
    }

    public function toproductManagementPage(){
       
    
        return view('admin-page.product-management.product-management');
    }

    public function toCreateproductPage(){
        
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin-page.product-management.create-product', ["categories" => $categories, "brands" => $brands]);
    }
    public function touserManagementPage(){

        return view('admin-page.user-management.user-management');
    }
    public function toCreateuserPage(){
        $roles = Roles::all();
        return view('admin-page.user-management.create-user', ["roles" => $roles]);
    }
    public function toedituserPage($id){
        $user = User::find($id);
        $roles = roles::all();


        return view('admin-page.user-management.edit-user', ["roles" => $roles, "user" => $user]);
    }
    //admin
    public function toadminManagementPage(){

        return view('admin-page.admin-management.admin-management');
    }
    public function toCreateadminPage(){
        $roles = Roles::all();
        return view('admin-page.admin-management.create-admin', ["roles" => $roles]);
    }
    public function toEditadminPage($id){
        $user = User::find($id);
        $roles = roles::all();


        return view('admin-page.admin-management.edit-admin', ["roles" => $roles, "user" => $user]);
    }
    public function toEditpassadminPage($id){
        $user = User::find($id);
        
        return view('admin-page.admin-management.update-pass-admin', ["user" => $user]);
    }

    //Promo
    public function topromoManagementPage(){
        return view('admin-page.admin-promo.promo-management');
    }
    public function toCreatepromoPage(){
        return view('admin-page.admin-promo.create-promo');
    }
    public function toEditpromoPage($id){
        $promo = Promo::find($id);

        return view('admin-page.admin-promo.edit-promo', ["promo" => $promo]);
    }

    //Announcement
    public function toannouncementManagementPage(){

        return view('admin-page.admin-announce.annnouncement-management');
    }
    public function toCreateannouncementPage(){
        $promo = Promo::all();

        
        return view('admin-page.admin-announce.create-announcement',["promo" => $promo]);
    }
    public function toEditannouncementPage($id){
        $announcement = Announcement::find($id);
        $promo = Promo::all();

        return view('admin-page.admin-announce.edit-announcement', ["announcement" =>$announcement, "promo" => $promo]);
    }




    //User Information

    public function toCartPage(){
        return view('transactions.cart');
    }

    public function toProtectedPage(){
        return view('protectedPage');
    }

    public function toDashboardPage(){
        return view('admin-page.dashboard');
    }
}
