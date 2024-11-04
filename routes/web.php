<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ResetPassController;
use App\Http\Controllers\Admin\Auth\AuthController as AdminAuthController;
use App\Http\Middleware\AdminAuth;

//Login
Route::get('/',[AuthController::class,'showLoginForm'])->name('login');
Route::post('/login',[AuthController::class,'Login'])->name('login.submit');

//Register
Route::get('/register',[AuthController::class,'showRegisterForm'])->name('register.form');
Route::post('/register',[AuthController::class,'Register'])->name('register.submit');
                                                                //Route name

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');
    
});

Route::post('/logout',[AuthController::class,'logout'])->name('logout');

//Password Reset                                                                    //{{ route('password.request') }}
Route::get('/reset-password',[ResetPassController::class,'showRequestForm'])->name('password.request');
Route::post('/password/email',[ResetPassController::class,'sendResetLink'])->name('password.email');
Route::get('/password/reset/{token}',[ResetPassController::class,'showResetForm'])->name('password.reset');
Route::post('/password/reset',[ResetPassController::class,'resetPassword'])->name('password.update');


//Admin Route

Route::prefix('admin')->group(function(){
    Route::get('/',[AdminAuthController::class,'index'])->name('login.admin');

    Route::post('/login',[AdminAuthController::class,'login'])->name('admin.login.submit');

    Route::middleware([AdminAuth::class])->group(function(){
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
        Route::get('/Homepage', [AdminAuthController::class, 'HomePage'])->name('HomePage');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    });


});

//Route::get('/admin/',[AdminAuthController::class,'index'])->name('login.admin');

