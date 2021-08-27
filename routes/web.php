<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfilController;
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

// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/', [ProductController::class, 'index']);
Route::post('/', [ProductController::class, 'index']);
Route::get('/detail/{id_product:id_product}', [ProductController::class, 'detail']);
Route::get('/brand/{brand:id_brand}', [ProductController::class, 'brand']);

Route::post('/addToCart', [CartController::class, 'addToCart'])->middleware('auth');
Route::post('/addToCart2', [CartController::class, 'addToCart2'])->middleware('auth');
Route::post('/buyNow', [CartController::class, 'buyNow'])->middleware('auth');
Route::get('/cart', [CartController::class, 'cart'])->middleware('auth');
Route::post('/updateCart', [CartController::class, 'updateCart'])->middleware('auth');
Route::get('/deleteCart/{id_cart}', [CartController::class, 'deleteCart'])->middleware('auth');

Route::post('/checkout', [OrderController::class, 'checkout'])->middleware('auth');
Route::get('/history', [OrderController::class, 'history'])->middleware('auth');
Route::get('/deleteOrder/{id_order}', [OrderController::class, 'deleteOrder'])->middleware('auth');
Route::get('/payment/{id_order}', [OrderController::class, 'payment'])->middleware('auth');
Route::post('/updatePayment', [OrderController::class, 'updatePayment'])->middleware('auth');

Route::get('/profil', [ProfilController::class, 'index'])->middleware('auth');
Route::get('/profil/edit', [ProfilController::class, 'edit'])->middleware('auth');
Route::post('/profil/update', [ProfilController::class, 'update'])->middleware('auth');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/order', [AdminController::class, 'order']);
    Route::get('/admin/order/{id_order}', [AdminController::class, 'detailOrder']);
    Route::post('/admin/order/verified', [AdminController::class, 'verifiedOrder']);
    Route::post('/admin/order/accepted', [AdminController::class, 'orderAccepted']);
    Route::get('/admin/product', [AdminController::class, 'product']);
    Route::post('/admin/addProduct', [AdminController::class, 'addProduct']);
    Route::get('/admin/product/{id_product:id_product}', [AdminController::class, 'detailProduct']);
    Route::get('/admin/editProduct/{id_product}', [AdminController::class, 'editProduct']);
    Route::post('/admin/updateProduct', [AdminController::class, 'updateProduct']);
    Route::get('/admin/deleteProduct/{id_product}', [AdminController::class, 'deleteProduct']);
    Route::get('/admin/brand', [AdminController::class, 'brand']);
    Route::post('/admin/addBrand', [AdminController::class, 'addBrand']);
    Route::get('/admin/editBrand/{id_brand}', [AdminController::class, 'editBrand']);
    Route::post('/admin/updateBrand', [AdminController::class, 'updateBrand']);
    Route::get('/admin/deleteBrand/{id_brand}', [AdminController::class, 'deleteBrand']);
    Route::get('/admin/account', [AdminController::class, 'account']);
    Route::get('/admin/detailAccount/{id}', [AdminController::class, 'detailAccount']);
    Route::post('/admin/updateRole', [AdminController::class, 'updateRole']);
    Route::get('/admin/deleteAccount/{id}', [AdminController::class, 'deleteAccount']);
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
