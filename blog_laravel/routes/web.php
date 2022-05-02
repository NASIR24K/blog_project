<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LogInController;

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/',[FrontController::class, 'index'])->name('front.index');
/////////////////////////////admin///////////////////////////
Route::get('admin/login',[LogInController::class, 'ShowAdminLogInForm'])->name('admin.login');
Route::post('admin/login/submit',[LogInController::class, 'adminLogin'])->name('admin.login.submit');
Route::get('admin/logout',[LogInController::class, 'adminlogout'])->name('admin.logout');
Route::get('admin/forget',[LogInController::class, 'Forget'])->name('admin.forget');
Route::POST('admin/forget/submit',[LogInController::class, 'ForgetPassword'])->name('admin.forget.submit');




Route::get('admin/dashboard',[DashboardController::class, 'AdminIndex'])->name('admin.dashboard');
Route::get('admin/profile',[DashboardController::class, 'profile'])->name('admin.profile');
Route::post('admin/profile/submit',[DashboardController::class, 'profileSubmit'])->name('admin.profile.submit');
Route::get('admin/reset',[DashboardController::class, 'ResetAdmin'])->name('admin.reset');
Route::post('admin/reset/submit',[DashboardController::class, 'ResetPassword'])->name('admin.reset.submit');

