<?php

namespace App\Http\Controllers;

use App\Mail\StoreEmailSender;
use App\Models\Announcement;
use App\Models\Brand;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\product;
use App\Models\Promo;
use App\Models\roles;
use App\Models\Transaction;
use App\Models\TransactionGroup;
use App\Models\TransactionRelation;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Support\Facades\Mail;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;


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

    public function toHistoryTransactionsPage(){
        
        $transactions = TransactionGroup::where("user_id", Auth::id())->get();
        $userInformation = UserInformation::where("user_id", Auth::id())->where("full_name", null)->where("gender", null)->where("city_id", null)->where("city_id", null)->where("province_id", null)->where("address", null)->where("postal_code", null)->where("birth_date", null)->first();
        
        $haveInformation = $userInformation == null;
        return view("transactions.historyTransaction", ["transactions" => $transactions, "hasInformation" => $haveInformation]);
    }

    public function toTransactionDetailPage($invoice){
        $transactionDetail = TransactionGroup::where("invoice", $invoice)->first();
       
        return view("transactions.transactionDetail", ["transaction" => $transactionDetail]);
    }

    public function totransactionsManagementPage(){
        return view("admin-page.transaction-management.transaction-management");
    }

    public function toRegisterPage(){
        
        // $transaction = TransactionGroup::first();
        // $url = "";
        // if($transaction != null){
        //     $url = $transaction->snap_token;
        //     if (empty($snapToken)) {
        //         // Jika snap token masih NULL, buat token snap dan simpan ke database
    
        //         $midtrans = new CreateSnapTokenService($transaction);
        //         $url = $midtrans->getSnapToken();
    
        //         // $transaction->snap_token = $snapToken;
        //         // $transaction->save();
        //     }
        // }
        
        return view("auth.register");
    }

    public function toVerificationPage(Request $request){
        $user = UserInformation::where("user_id", $request->query("id"))->where("token", $request->query("token"))->first();
        $status = "verified";
        if($user->is_email_verified == 1){
            $status = "Not Found";
        }

        return view('auth.verificationPage', ["status" => $status]);
        
    }

    public function toSendResetPasswordPage(){
        return view('auth.SendResetPasswordPage');
    }

    public function toResetPasswordPage(Request $request){
        $user = UserInformation::where("user_id", $request->query("id"))->where("token", $request->query("token"))->first();
        $status = "verified";
        if($user == null){
            $status = "Not Found";
        }
        return view('auth.resetPassword', ["status" => $status]);
    }

    public function toEmailResetPasswordPage(Request $request){

        return view('auth.emailResetPasswordPage');
        
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

        return view('admin-page.admin-announce.edit-announcement', ["announcement" =>$announcement]);

    }




    //User Information

    public function toCartPage(){
        $carts = Cart::where("user_id", Auth::id())->get();
        return view('transactions.cart', ["carts" => $carts]);
    }

    public function toProtectedPage(){
        return view('protectedPage');
    }

    public function toProfilePage(){
        
        return view('ProfileUser.ProfileUser');
    }
    public function toDashboardPage(){
        
        
        $chart = [];
        $chart_options = [
            'chart_title' => 'Monthly revenue',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\TransactionGroup',
            'group_by_field' => 'date_transaction',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'total_price',
            'where_raw'  => "status = 'Terbayar'",
            'chart_color' => '245, 39, 153'
        ];
        $chart_options_user = [
            'chart_title' => 'Daily active User',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'last_login',
            'group_by_period' => 'day',
            'chart_type' => 'line',
            'aggregate_function' => 'count',
            'aggregate_field' => 'id',
            'chart_color' => '245, 39, 153'
        ];
        $data = new LaravelChart($chart_options);
        $userData = new LaravelChart($chart_options_user);
        array_push($chart, $data);
        array_push($chart, $userData);
        return view('admin-page.dashboard', compact("chart"));
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
            $user = UserInformation::where("user_id", Auth::id())->first();
            $hasPhoneNumber = $user->is_phone_verified == 1;
        }
        return view('auth.phoneNumberForm', ["hasPhoneNumber" => $hasPhoneNumber]);
    }

    public function toUsersManagementPage(){
        return view("admin-page.user-management.user-management");
    }

    public function toUserInformationFormPage(){
        return view("auth.userInformationForm");
    }
}
