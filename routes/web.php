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
Route::get('/register', [RouteController::class, "toRegisterPage"])->name("toRegisterPage")->middleware('IfUserNotLoggedIn');
Route::post('/processRegister', [AuthController::class, "processRegister"])->name("processRegister");
Route::get('/sendEmail', [RouteController::class, "toSendEmailPage"])->name("sendEmail");
Route::get('/login', [RouteController::class, "toLoginPage"])->name("toLoginPage")->middleware('IfUserNotLoggedIn');
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
Route::get('/logout', [AuthController::class, "logout"])->name("logout")->middleware('auth');


Route::get('/about', function () {
    return view('AboutUs');
})->name("about");

// User 
Route::get('/wishlist', [RouteController::class, "toWishListPage"])->name("toWishListPage")->middleware("auth");
Route::get('/cart', [RouteController::class, "toCartPage"])->name("toCartPage")->middleware("auth");
Route::get('/createUserInformation', [RouteController::class, "toUserInformationFormPage"])->name("toUserInformationFormPage")->middleware("auth");
Route::get('/profile', [RouteController::class,"toProfilePage"])->name("toProfilePage")->middleware("auth");
Route::POST('/processUpdatepassword', [UserInformationController::class, "setUserPassword"])->name("processUpdatepassword");


// Transactions
Route::get('/transactions', [RouteController::class, "toHistoryTransactionsPage"])->name("toHistoryTransactionsPage")->middleware("auth");
Route::get('/transaction/{invoice}', [RouteController::class, "toTransactionDetailPage"])->name("toTransactionDetailPage")->middleware("auth");


// Admin
Route::get('/dashboard', [RouteController::class, "toDashboardPage"])->name("toDashboardPage")->middleware("checkAdmin");
Route::get('/createProduct', [RouteController::class, "toCreateProductPage"])->name("toCreateProductPage")->middleware("checkAdmin");
Route::get('/editProduct/{id}', [RouteController::class, "toEditProductPage"])->name("toEditProductPage")->middleware("checkAdmin");
Route::get('/productsManagement', [RouteController::class, "toProductsManagementPage"])->name("toProductsManagementPage")->middleware("checkAdmin");
Route::get('/brandsManagement', [RouteController::class, "toBrandsManagementPage"])->name("toBrandsManagementPage")->middleware("checkAdmin");
Route::get('/categoriesManagement', [RouteController::class, "toCategoriesManagementPage"])->name("toCategoriesManagementPage")->middleware("checkAdmin");
Route::get('/usersManagement', [RouteController::class, "toUsersManagementPage"])->name("toUsersManagementPage")->middleware("checkAdmin");
Route::get('/transactionsManagement', [RouteController::class, "totransactionsManagementPage"])->name("totransactionsManagementPage")->middleware("checkAdmin");



// Product
Route::post('/processCreateProduct', [ProductController::class, "createProduct"])->name("processCreateProduct")->middleware("checkAdmin");
Route::post('/processUpdateProduct', [ProductController::class, "updateProduct"])->name("processUpdateProduct")->middleware("checkAdmin");
Route::get('/product/{id}', [ProductController::class, "getProductById"])->name("getProductById")->middleware("checkAdmin");


// Brand


// Owner
Route::get('/userManagement',[RouteController::class, "touserManagementPage"])->name("touserManagementPage")->middleware("checkAdmin");
Route::get('/createUser',[RouteController::class, "tocreateuserPage"])->name("tocreateuserPage")->middleware("checkAdmin");
Route::get('/editUser/{id}',[RouteController::class, "toedituserPage"])->name("toedituserPage")->middleware("checkAdmin");
Route::post('/processCreateuser', [userController::class, "createuser"])->name("processCreateuser")->middleware("checkAdmin");

//Owner-Admin Management
Route::get('/adminManagement',[RouteController::class, "toadminManagementPage"])->name("toadminManagementPage")->middleware("checkAdmin");
Route::get('/createAdmin',[RouteController::class, "tocreateadminPage"])->name("tocreateadminPage")->middleware("checkAdmin");
Route::get('/editAdmin/{id}',[RouteController::class, "toEditadminPage"])->name("toEditadminPage")->middleware("checkAdmin");
Route::get('/toEditAdminPass/{id}',[RouteController::class, "toEditpassadminPage"])->name("toEditadminpassPage")->middleware("checkAdmin");
Route::POST('/processCreateadmin', [AdminController::class, "createadmin"])->name("processCreateadmin")->middleware("checkAdmin");
Route::POST('/processUpdatepassadmin', [AdminController::class, "updatepassword"])->name("processUpdatepassadmin")->middleware("checkAdmin");
Route::POST('/processUpdateadmin', [AdminController::class, "updateadmin"])->name("processUpdateadmin")->middleware("checkAdmin");
Route::POST('/deleteAdmin', [AdminController::class, "deleteAdmin"])->name("deleteAdmin")->middleware("checkAdmin");

//promo

Route::get('/createPromo',[RouteController::class, "toCreatepromoPage"])->name("toCreatepromoPage")->middleware("checkAdmin");
Route::get('/editPromo/{id}',[RouteController::class, "toEditpromoPage"])->name("toEditpromoPage")->middleware("checkAdmin");
Route::get('/promoManagement',[RouteController::class, "topromoManagementPage"])->name("topromoManagementPage")->middleware("checkAdmin");
Route::POST('/processCreatepromo', [PromoController::class, "createpromo"])->name("processCreatepromo")->middleware("checkAdmin");
Route::POST('/processUpdatepromo', [PromoController::class, "updatepromo"])->name("processUpdatepromo")->middleware("checkAdmin");
Route::POST('/deletePromo', [PromoController::class, "deletePromo"])->name("deletePromo")->middleware("checkAdmin");

//announcement
Route::get('/createAnnouncement',[RouteController::class, "toCreateannouncementPage"])->name("toCreateannouncementPage")->middleware("checkAdmin");
Route::get('/editAnnouncement/{id}',[RouteController::class, "toEditannouncementPage"])->name("toEditannouncementPage")->middleware("checkAdmin");
Route::get('/announcementManagement',[RouteController::class, "toannouncementManagementPage"])->name("toannouncementManagementPage")->middleware("checkAdmin");
Route::POST('/processCreateannouncement', [AnnouncementController::class, "createannouncement"])->name("processCreateannouncement")->middleware("checkAdmin");
Route::POST('/processUpdateannouncement', [AnnouncementController::class, "updateannouncement"])->name("processUpdateannouncement")->middleware("checkAdmin");
Route::POST('/deleteAnnouncement', [AnnouncementController::class, "deleteAnnouncement"])->name("deleteAnnouncement")->middleware("checkAdmin");

//user_info



// Utility
Route::post('/sendEmailto', [RouteController::class, "sendEmail"])->name("sendEmailTo");
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Route::get('/languageDemo', 'App\Http\Controllers\Controller@languageDemo');
Route::get('/protectedPage', [RouteController::class, "toProtectedPage"])->middleware('auth.basic');
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Route::get('/languageDemo', 'App\Http\Controllers\Controller@languageDemo');

