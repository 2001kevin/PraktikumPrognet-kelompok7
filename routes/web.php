<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeBaseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CartController;


Route::get('/', [HomeBaseController::class, 'home']);
Route::get('/viewcategory/{product_category}', [HomeBaseController::class, 'viewcategory']);
//view detail product
Route::get('/detail/{product}', [HomeBaseController::class, 'detailproduct']);
//Route::get('/home', function () {
//    return view('menus.index');
//});
Route::get('/about', function () {
    return view('menus.about', ["title" => "About"]);
});
Route::get('/shop', [HomeBaseController::class, 'shopview']);
Route::get('/testimoni', function () {
    return view('menus.testi', ["title" => "Testimoni"]);
});
Route::get('/contact', [ContactController::class, 'contact'])->name('contact.send');
Route::post('/contact/send', [ContactController::class, 'sendEmail'])->name('contact.send');

Auth::routes(['verify' => true]);

// User
Route::prefix('user')->name('client.')->group(function () {
    Route::middleware(['guest:web'])->group(function () {
        Route::get('login', [LoginController::class, 'login'])->name('login');
        Route::get('register', [LoginController::class, 'register'])->name('register');
        Route::post('registers_proses', [LoginController::class, 'proses_register'])->name('register_proses');
        Route::post('logins_proses', [LoginController::class, 'proses_login'])->name('login_proses');
    });
    Route::middleware(['auth:web'])->group(function () {
        Route::get('about', function () {
            return view('menus.about');
        })->name('home');
        Route::post('/contact/send', [ContactController::class, 'sendEmail'])->name('contact.send');
        Route::get('/change-password', [ChangePasswordController::class, 'create'])->name('password.create');
        Route::post('/change-password', [ChangePasswordController::class, 'update'])->name('password.update');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});
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
    Route::get('/cart',[CartController::class,'cartindex']);
});


// Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['guest:admin'])->group(function () {
        Route::get('login', [AdminController::class, 'login'])->name('login');
        Route::post('logins_proses', [AdminController::class, 'proses_login'])->name('login_proses');
    });
    Route::middleware(['auth:admin'])->group(function () {
        Route::view('admin.home', 'admin.home')->name('home');
    });
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
