<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
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

Route::get('/', [IndexController::class, 'home']);
Route::get('/category/{slug}', [IndexController::class, 'category']);
Route::get('/collection/{slug}', [IndexController::class, 'collection']);
Route::get('/product/{slug}', [IndexController::class, 'detail']);
Route::get('/all-products', [IndexController::class, 'all_products']);
Route::get('/search', [IndexController::class, 'search']);
Route::get('/contact', [IndexController::class, 'contact']);


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('admin/category', CategoryController::class);
Route::resource('admin/product', ProductController::class);
Route::resource('admin/slide', SlideController::class);
Route::resource('admin/collection', CollectionController::class);

//login
Route::post('/login/create', [CustomerController::class, 'store']);
Route::resource('admin/customer', CustomerController::class)->except('store');
Route::post('/login/user', [CustomerController::class, 'loginUser']);
Route::get('/logout', [CustomerController::class, 'logout']);
//contact
Route::resource('admin/contact', ContactController::class);
//cart
Route::resource('/cart-user', CartController::class);




