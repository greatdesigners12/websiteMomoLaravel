<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\AuthController;
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
Route::get('/products', [RouteController::class, "toProductsPage"])->name("products");
Route::get('/contact', [RouteController::class, "toContactPage"])->name("contact");

// authentication
Route::get('/register', [RouteController::class, "toRegisterPage"])->name("toRegisterPage");
Route::post('/processRegister', [AuthController::class, "processRegister"])->name("processRegister");
Route::get('/sendEmail', [RouteController::class, "toSendEmailPage"])->name("sendEmail");
Route::get('/login', [RouteController::class, "toLoginPage"])->name("toLoginPage");
Route::post('/processLogin', [AuthController::class, "login"])->name("processLogin");
Route::get('/emailVerification', [RouteController::class, "toVerificationPage"])->name("toVerificationPage");
Route::post('/verifyUser', [AuthController::class, "verifyUser"])->name("verifyUser");
Route::post('/processPhoneNumber', [AuthController::class, "processPhoneNumber"])->name("processPhoneNumber");
Route::get('/validatePhoneNumber', [RouteController::class, "toValidatePhoneNumber"])->name("toValidatePhoneNumber");
Route::get('/otpVerification/{token}', [RouteController::class, "toOtpVerificationPage"])->name("toOtpVerificationPage");

// User 
Route::get('/wishlist', [RouteController::class, "toWishListPage"])->name("toWishListPage");
Route::get('/cart', [RouteController::class, "toCartPage"])->name("toCartPage");

// Admin
Route::get('/dashboard', [RouteController::class, "toDashboardPage"])->name("toDashboardPage");
Route::get('/createProduct', [RouteController::class, "toCreateProductPage"])->name("toCreateProductPage");
Route::get('/editProduct/{id}', [RouteController::class, "toEditProductPage"])->name("toEditProductPage");
Route::get('/productsManagement', [RouteController::class, "toProductsManagementPage"])->name("toProductsManagementPage");
Route::get('/brandsManagement', [RouteController::class, "toBrandsManagementPage"])->name("toBrandsManagementPage");
Route::get('/categoriesManagement', [RouteController::class, "toCategoriesManagementPage"])->name("toategoriesManagementPage");

// Product
Route::post('/processCreateProduct', [ProductController::class, "createProduct"])->name("processCreateProduct");
Route::post('/processUpdateProduct', [ProductController::class, "updateProduct"])->name("processUpdateProduct");

// Brand



// Utility
Route::post('/sendEmailto', [RouteController::class, "sendEmail"])->name("sendEmailTo");
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Route::get('/languageDemo', 'App\Http\Controllers\Controller@languageDemo');
Route::get('/protectedPage', [RouteController::class, "toProtectedPage"])->middleware('auth.basic');