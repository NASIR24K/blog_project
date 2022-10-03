<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LogInController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;


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


//////---admin section Routes----------//////

Route::get('admin/dashboard',[DashboardController::class, 'AdminIndex'])->name('admin.dashboard');
Route::get('admin/profile',[DashboardController::class, 'profile'])->name('admin.profile');
Route::post('admin/profile/submit',[DashboardController::class, 'profileSubmit'])->name('admin.profile.submit');
Route::get('admin/reset',[DashboardController::class, 'ResetAdmin'])->name('admin.reset');
Route::post('admin/reset/submit',[DashboardController::class, 'ResetPassword'])->name('admin.reset.submit');


///-----------------Admin Category-------------///
Route::get('admin/category/index', [CategoryController::class, 'index'])->name('admin.category.index');
Route::get('admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
Route::post('admin/category/submit', [CategoryController::class, 'submit'])->name('admin.category.submit');

/////////////////////-------------Admin Product------///////////
Route::get('admin/product/index', [ProductController::class, 'index'])->name('admin.product.index');
Route::get('admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');
Route::Post('admin/product/submit', [ProductController::class, 'submit'])->name('admin.product.submit');
Route::get('admin/product/edit/{slug}', [ProductController::class, 'edit'])->name('admin.product.edit');
Route::post('admin/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
/////////////////////////////END ADMIN PRODUCT /////////////////////////////////////////////////

