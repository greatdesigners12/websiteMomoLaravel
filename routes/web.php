<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\userController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\UserInformationController;
use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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
Route::get('/password', [RouteController::class, "toPassword"])->name("password");

// authentication
Route::get('/register', [RouteController::class, "toRegisterPage"])->name("toRegisterPage");
Route::post('/processRegister', [AuthController::class, "processRegister"])->name("processRegister");
Route::get('/sendEmail', [RouteController::class, "toSendEmailPage"])->name("sendEmail");
Route::get('/login', [RouteController::class, "toLoginPage"])->name("toLoginPage");
Route::post('/processLogin', [AuthController::class, "login"])->name("processLogin");
Route::get('/emailVerification', [RouteController::class, "toVerificationPage"])->name("toVerificationPage");
Route::get('/sendResetPassword', [RouteController::class, "toSendResetPasswordPage"])->name("toSendResetPasswordPage");
Route::get('/resetPassword', [RouteController::class, "toResetPasswordPage"])->name("toResetPasswordPage");
Route::post('/processSendResetPasswordEmail', [AuthController::class, "processSendResetPasswordEmail"])->name("processSendResetPasswordEmail");
Route::post('/processResetPassword', [AuthController::class, "processResetPassword"])->name("processResetPassword");
Route::post('/verifyUser', [AuthController::class, "verifyUser"])->name("verifyUser");
Route::post('/processPhoneNumber', [AuthController::class, "processPhoneNumber"])->name("processPhoneNumber");
Route::get('/validatePhoneNumber', [RouteController::class, "toValidatePhoneNumber"])->middleware('hasPhoneNumber')->name("toValidatePhoneNumber");
Route::get('/otpVerification/{token}', [RouteController::class, "toOtpVerificationPage"])->name("toOtpVerificationPage");


Route::get('/about', function () {
    return view('AboutUs');
})->name("about");

// User 
Route::get('/wishlist', [RouteController::class, "toWishListPage"])->name("toWishListPage");
Route::get('/cart', [RouteController::class, "toCartPage"])->name("toCartPage");
Route::get('/createUserInformation', [RouteController::class, "toUserInformationFormPage"])->name("toUserInformationFormPage");
Route::get('/Profile', [RouteController::class,"toProfilePage"])->name("toProfilePage");
Route::POST('/processUpdatepassword', [UserInformationController::class, "setUserPassword"])->name("processUpdatepassword");


// Transactions
Route::get('/transactions', [RouteController::class, "toHistoryTransactionsPage"])->name("toHistoryTransactionsPage");
Route::get('/transaction/{invoice}', [RouteController::class, "toTransactionDetailPage"])->name("toTransactionDetailPage");


// Admin
Route::get('/dashboard', [RouteController::class, "toDashboardPage"])->name("toDashboardPage");
Route::get('/createProduct', [RouteController::class, "toCreateProductPage"])->name("toCreateProductPage");
Route::get('/editProduct/{id}', [RouteController::class, "toEditProductPage"])->name("toEditProductPage");
Route::get('/productsManagement', [RouteController::class, "toProductsManagementPage"])->name("toProductsManagementPage");
Route::get('/brandsManagement', [RouteController::class, "toBrandsManagementPage"])->name("toBrandsManagementPage");
Route::get('/categoriesManagement', [RouteController::class, "toCategoriesManagementPage"])->name("toCategoriesManagementPage");
Route::get('/usersManagement', [RouteController::class, "toUsersManagementPage"])->name("toUsersManagementPage");
Route::get('/transactionsManagement', [RouteController::class, "totransactionsManagementPage"])->name("totransactionsManagementPage");



// Product
Route::post('/processCreateProduct', [ProductController::class, "createProduct"])->name("processCreateProduct");
Route::post('/processUpdateProduct', [ProductController::class, "updateProduct"])->name("processUpdateProduct");
Route::get('/product/{id}', [ProductController::class, "getProductById"])->name("getProductById");


// Brand


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
Route::POST('/deleteAdmin', [AdminController::class, "deleteAdmin"])->name("deleteAdmin");

//promo

Route::get('/createPromo',[RouteController::class, "toCreatepromoPage"])->name("toCreatepromoPage");
Route::get('/editPromo/{id}',[RouteController::class, "toEditpromoPage"])->name("toEditpromoPage");
Route::get('/promoManagement',[RouteController::class, "topromoManagementPage"])->name("topromoManagementPage");
Route::POST('/processCreatepromo', [PromoController::class, "createpromo"])->name("processCreatepromo");
Route::POST('/processUpdatepromo', [PromoController::class, "updatepromo"])->name("processUpdatepromo");
Route::POST('/deletePromo', [PromoController::class, "deletePromo"])->name("deletePromo");

//announcement
Route::get('/createAnnouncement',[RouteController::class, "toCreateannouncementPage"])->name("toCreateannouncementPage");
Route::get('/editAnnouncement/{id}',[RouteController::class, "toEditannouncementPage"])->name("toEditannouncementPage");
Route::get('/announcementManagement',[RouteController::class, "toannouncementManagementPage"])->name("toannouncementManagementPage");
Route::POST('/processCreateannouncement', [AnnouncementController::class, "createannouncement"])->name("processCreateannouncement");
Route::POST('/processUpdateannouncement', [AnnouncementController::class, "updateannouncement"])->name("processUpdateannouncement");
Route::POST('/deleteAnnouncement', [AnnouncementController::class, "deleteAnnouncement"])->name("deleteAnnouncement");

//user_info



// Utility
Route::post('/sendEmailto', [RouteController::class, "sendEmail"])->name("sendEmailTo");
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Route::get('/languageDemo', 'App\Http\Controllers\Controller@languageDemo');
Route::get('/protectedPage', [RouteController::class, "toProtectedPage"])->middleware('auth.basic');
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Route::get('/languageDemo', 'App\Http\Controllers\Controller@languageDemo');

