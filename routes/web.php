<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\AuthController;
use App\Models\Kategori;
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

// User 
Route::get('/wishlist', [RouteController::class, "toWishListPage"])->name("toWishListPage");
Route::get('/cart', [RouteController::class, "toCartPage"])->name("toCartPage");

// Admin
Route::get('/productManagement', [RouteController::class, "toProductManagementPage"])->name("toProductManagementPage");

// Utility
Route::post('/sendEmailto', [RouteController::class, "sendEmail"])->name("sendEmailTo");
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);
Route::get('/languageDemo', 'App\Http\Controllers\Controller@languageDemo');
Route::get('/protectedPage', [RouteController::class, "toProtectedPage"])->middleware('auth.basic');