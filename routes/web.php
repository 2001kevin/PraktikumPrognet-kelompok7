<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Admin\HomeController;

Route::get('/', function () {return view('menus.index');});
Route::get('/index', function () {return view('menus.index');});
Route::get('/about', function () {return view('menus.about',["title" => "About"]);});
Route::get('/shop', function () {return view('menus.shop',["title" => "Shop"]);});
Route::get('/testimoni', function(){return view('menus.testi',["title"=> "Testimoni"]);});
Route::get('/login', function () {return view('welcome');});
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
});

// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth.admin']], function () {
    Route::get('/admin-dashboard', [HomeController::class, 'index'])->name('home');
 });

Route::resource('product', ProductController::class);
Route::resource('discount', DiscountController::class);

