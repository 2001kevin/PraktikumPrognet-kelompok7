<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeBaseController;
use App\Http\Controllers\ProductReviewController;
use App\Models\product_review;

Route::get('/', [HomeBaseController::class, 'home']);
Route::get('/viewcategory/{product_category}', [HomeBaseController::class, 'viewcategory']);
//view detail product
Route::get('/detail/{product}', [HomeBaseController::class,'detailproduct'])->name('detail_product');
Route::get('/index', function () {return view('menus.index');});
Route::get('/about', function () {return view('menus.about',["title" => "About"]);});
Route::get('/shop', [HomeBaseController::class, 'shopview']);
Route::get('/testimoni', function(){return view('menus.testi',["title"=> "Testimoni"]);});
Route::get('/login', function () {return view('welcome');});
Route::get('/hapus/cart/{product}', [HomeBaseController::class,'detailproduct'])->name('keranjang-hapus');
Route::post('/cart/alamat}', [CartController::class,'keranjang_alamat'])->name('keranjang-alamat');
Route::post('/cart/checkout}', [CartController::class,'keranjang_checkout'])->name('keranjang-checkout');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact.send');
Route::post('/contact/send', [ContactController::class, 'sendEmail'])->name('contact.send');


Auth::routes(['verify'=> true]);

// User
Route::group(['as' => 'client.', 'middleware' => ['auth']], function () {
    Route::get('home', 'HomeController@redirect');
    Route::get('/shop', function () {return view('menus.shop');})->name('home');
    Route::post('/contact/send', [ContactController::class, 'sendEmail'])->name('contact.send');
    Route::get('/change-password', [ChangePasswordController::class, 'create'])->name('password.create');
    Route::post('/change-password', [ChangePasswordController::class, 'update'])->name('password.update');
    Route::post('/sign-out',[LoginController::class, 'logout']);
    Route::get('/cart-adds/{id}/', [CartController::class, 'keranjang_tambah'])->name('tambah');
    Route::get('/beli-langsung/{id}/', [CartController::class, 'beli_langsung'])->name('beli-langsung');
    Route::get('/beli-alamat/{id}/', [CartController::class, 'beli_alamat'])->name('beli-alamat');
    Route::post('/beli/checkout/{id}/{jumlah}', [CartController::class, 'beli_checkout'])->name('beli-checkout');
    Route::post('/beli-bayar/{id}/{jumlah}', [CartController::class, 'beli_bayar'])->name('beli-bayars');
    Route::get('/transaksi-detail/{id}',[CartController::class,'transaksi_detail'])->name('transaksi-detail');
    Route::post('/transaksi-bukti/{id}',[CartController::class,'transaksi_bukti'])->name('transaksi-bukti');
    Route::get('/transaksi-batal/{id}',[CartController::class,'transaksi_batal'])->name('transaksi-batal');
    Route::get('/transaksi-status/{id}',[CartController::class,'transaksi_status'])->name('adm-transaksi-status');
    Route::get('/keranjang/bayar',[CartController::class,'keranjang_bayar'])->name('keranjang-bayar');
    Route::get('/transaksi-bukti/{id}',[CartController::class,'transaksi_buktis'])->name('transaksi-bukti');
    Route::get('/cart',[CartController::class,'cartindex']);
});


// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth.admin']], function () {
    Route::get('/admin-dashboard', [HomeController::class, 'index'])->name('home');
    
});
//CRUD MASTER TABLE
Route::resource('courier', CourierController::class);
Route::resource('product', ProductController::class);
Route::resource('discount', DiscountController::class);
Route::resource('product_image', ProductImageController::class);
Route::resource('product_category', ProductCategoryController::class);
Route::resource('product_category_detail', ProductCategoryDetailController::class);

//USER REVIEW
Route::post('product/review', [ProductReviewController::class, 'store']);


