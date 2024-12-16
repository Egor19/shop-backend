<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ErrorsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('main', function () {
    return view('main');
});

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// Route::get('/list/filter', FilterController::class)->name('list.filter');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');

Route::get('/list', ListController::class)->name('list.index');

Route::get('/register', [HomeController::class, 'viewRegister'])->name('register.view');
Route::get('/login/view', [LoginController::class, 'viewLogin'])->name('login.view');
Route::middleware('auth')->post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::middleware('auth')->post('cart/buy/{id}', BuyController::class)->name('cart.buy');


Route::prefix('admin')->middleware('admin')->group(function() {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/form', [AdminController::class, 'viewForm'])->name('admin.form');
    Route::get('/list', [AdminController::class, 'viewList'])->name('admin.list');
    Route::get('/home', function () {
        return view('home');
    });
});

Route::prefix('seller')->middleware('seller')->group(function() {
    Route::get('/form', FormController::class)->name('form.view');
    Route::post('/submit-form', AddController::class)->name('form.store');
});

Route::prefix('user')->middleware('user')->group(function() {
    Route::get('/form', FormController::class)->name('form.view');
});

Route::prefix('error')->name('error.')->group(function() {
    Route::get('/403', [ErrorsController::class, 'forbidden'])->name('403');
    Route::get('/404', [ErrorsController::class, 'notFound'])->name('404');
    Route::get('/500', [ErrorsController::class, 'serverError'])->name('500');
});




Auth::routes();

Route::get('/home', function () {
    return view('home');
});


