<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;



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

Route::get('/',[ProductController::class,'index']);
Route::get('/login',function(){
    return view('login');
});
Route::post('login',[LoginController::class,'index']);
Route::get('/productdetail/{id}',[ProductController::class,'getProduct']);
Route::post('search',[ProductController::class,'search']);
Route::post('addtocart',[ProductController::class,'addToCart']);
Route::get('logout',function(){
    Session::forget('user');
    return redirect('/login');
});
Route::get('cartlist',[ProductController::class,'cartList']);
Route::get('cartdelete/{id}',[ProductController::class,'cartDelete']);
Route::get('checkout',[ProductController::class,'checkout']);
Route::post('order',[ProductController::class,'order']);
Route::view('register','register');
Route::post('register',[LoginController::class,'register']);
Route::get('orders',[ProductController::class,'orders']);
Route::get('orderdetail/{id}',[ProductController::class,'orderdetail']);
