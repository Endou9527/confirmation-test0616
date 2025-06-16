<?php

use Illuminate\Support\Facades\Route;
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

// 一覧表示
Route::get('/products',[ProductController::class,'index']);
// 詳細画面（＝更新画面）
Route::get('/products/{productId}',[ProductController::class,'detail'])->name('products.detail');
// 「詳細画面」内「変更を保存」→更新機能
Route::patch('/products/{productId}/update',[ProductController::class,'update'])->name('products.update');
// 登録画面の表示
Route::get('/products/register',[ProductController::class,'register']);
// 「登録」→登録機能
Route::post('/products/register/store',[ProductController::class,'store']);
// 「検索結果画面」表示（「"◯◯◯"の商品一覧」）
Route::get('/products/search',[ProductController::class,'search'])->name('products.search');
// 「詳細画面」内 🗑️→削除機能
// Route::get('/products/{productId}/delete',[ProductController::class,'destroy']);