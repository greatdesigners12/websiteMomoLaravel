<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\userController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\AnnouncementController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [RouteController::class, "toHomePage"])->name("home");
Route::get('/products', [RouteController::class, "toproductsPage"])->name("products");
Route::get('/contact', [RouteController::class, "toContactPage"])->name("contact");

// authentication
Route::get('/register', [RouteController::class, "toRegisterPage"])->name("toRegisterPage");
Route::post('/processRegister', [AuthController::class, "processRegister"])->name("processRegister");
Route::get('/sendEmail', [RouteController::class, "toSendEmailPage"])->name("sendEmail");
Route::get('/login', [RouteController::class, "toLoginPage"])->name("toLoginPage");
Route::post('/processLogin', [AuthController::class, "login"])->name("processLogin");
Route::get('/emailVerification', [RouteController::class, "toVerificationPage"])->name("toVerificationPage");
Route::post('/verifyUser', [AuthController::class, "verifyUser"])->name("verifyUser");


// User 
Route::get('/wishlist', [RouteController::class, "toWishListPage"])->name("toWishListPage");
Route::get('/cart', [RouteController::class, "toCartPage"])->name("toCartPage");

// Admin
Route::get('/dashboard', [RouteController::class, "toDashboardPage"])->name("toDashboardPage");
Route::get('/createproduct', [RouteController::class, "toCreateproductPage"])->name("toCreateproductPage");
Route::get('/editproduct/{id}', [RouteController::class, "toEditproductPage"])->name("toEditproductPage");
Route::get('/productManagement', [RouteController::class, "toproductManagementPage"])->name("toproductManagementPage");

// Owner
Route::get('/userManagement',[RouteController::class, "touserManagementPage"])->name("touserManagementPage");
Route::get('/createUser',[RouteController::class, "tocreateuserPage"])->name("tocreateuserPage");
Route::get('/editUser/{id}',[RouteController::class, "toedituserPage"])->name("toedituserPage");
Route::post('/processCreateuser', [userController::class, "createuser"])->name("processCreateuser");

//Owner-Admin Management
Route::get('/adminManagement',[RouteController::class, "toadminManagementPage"])->name("toadminManagementPage");
Route::get('/createAdmin',[RouteController::class, "tocreateadminPage"])->name("tocreateadminPage");
Route::get('/editAdmin/{id}',[RouteController::class, "toEditadminPage"])->name("toEditadminPage");
Route::get('/toEditAdminPass/{id}',[RouteController::class, "toEditpassadminPage"])->name("toEditadminpassPage");
Route::POST('/processCreateadmin', [AdminController::class, "createadmin"])->name("processCreateadmin");
Route::POST('/processUpdatepassadmin', [AdminController::class, "updatepassword"])->name("processUpdatepassadmin");
Route::POST('/processUpdateadmin', [AdminController::class, "updateadmin"])->name("processUpdateadmin");

// product
Route::post('/processCreateproduct', [productController::class, "createproduct"])->name("processCreateproduct");


//promo

Route::get('/createPromo',[RouteController::class, "toCreatepromoPage"])->name("toCreatepromoPage");
Route::get('/editPromo/{id}',[RouteController::class, "toEditpromoPage"])->name("toEditpromoPage");
Route::get('/promoManagement',[RouteController::class, "topromoManagementPage"])->name("topromoManagementPage");
Route::POST('/processCreatepromo', [PromoController::class, "createpromo"])->name("processCreatepromo");
Route::POST('/processUpdatepromo', [PromoController::class, "updatepromo"])->name("processUpdatepromo");

//announcement
Route::get('/createAnnouncement',[RouteController::class, "toCreateannouncementPage"])->name("toCreateannouncementPage");
Route::get('/editAnnouncement/{id}',[RouteController::class, "toEditannouncementPage"])->name("toEditannouncementPage");
Route::get('/announcementManagement',[RouteController::class, "toannouncementManagementPage"])->name("toannouncementManagementPage");
Route::POST('/processCreateannouncement', [AnnouncementController::class, "createannouncement"])->name("processCreateannouncement");
Route::POST('/processUpdateannouncement', [AnnouncementController::class, "updateannouncement"])->name("processUpdateannouncement");

//user_info



// Utility
Route::post('/sendEmailto', [RouteController::class, "sendEmail"])->name("sendEmailTo");
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Route::get('/languageDemo', 'App\Http\Controllers\Controller@languageDemo');
Route::get('/protectedPage', [RouteController::class, "toProtectedPage"])->middleware('auth.basic');