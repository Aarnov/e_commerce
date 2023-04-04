<?php

use App\Http\Controllers\PagesController;
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

Route::get('/',[PagesController::class,'login'])->name('login');
Route::get("/signup",[PagesController::class,'signup']);
Route::post("/signup",[PagesController::class,'signupForm']);

Route::post("/login",[PagesController::class,'loginForm']);

Route::get("/logout",[PagesController::class,'logout']);
Route::get("/category_list",[PagesController::class,'category_list']);
Route::post("/category_list",[PagesController::class,'storage_categories']);
Route::get('/delete_category/{id}',[PagesController::class,'delete_category']);
Route::get('/delete_cart/{id}',[PagesController::class,'delete_cart']);
Route::get('/edit_category/{id}',[PagesController::class,'edit_category']);
Route::post('/edit_category',[PagesController::class,'update_category']);
Route::get('/product_add',[PagesController::class,'product_add']);
Route::post('/product_add',[PagesController::class,'storage_product']);
Route::get('/edit_product/{id}',[PagesController::class,'edit_product']);
Route::post('/edit_product',[PagesController::class,'update_product']);

Route::group(['middleware'=>'auth'],function(){
    Route::get('/next',[PagesController::class,'nextPage']);
    Route::get('/profile/{id}/{second}',[PagesController::class,'profile']);
    Route::get('/create',[PagesController::class,'create']);
    Route::post('/create',[PagesController::class,'storeage']);
    Route::get('/list',[PagesController::class,'list']);
    Route::get('/edit/{id}',[PagesController::class,'edit']);
    Route::post('/edit',[PagesController::class,'update']);
    Route::get('/delete/{id}',[PagesController::class,'delete']);

    Route::get("/blank",[PagesController::class,'blank']);
    Route::get("/checkout",[PagesController::class,'checkout']);
    Route::get("/index",[PagesController::class,'index']);
    Route::get("/product/{id}",[PagesController::class,'product']);
    Route::post('/product/{id}',[PagesController::class,'add_to_cart']);
    Route::get("/store",[PagesController::class,'store']);
    Route::get("/categories",[PagesController::class,'categories']);




});

Route::resource('aarnov',App\Http\Controllers\TestController::class);
