<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminController;
use App\Models\User;
use App\Models\Order;
use App\Models\Service;
use App\Http\Controllers\UserController;



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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/orders', OrderController::class)->middleware('auth');
Route::resource('/services', ServiceController::class)->middleware('auth');
 ////// admin route ///////

Route::name('admin.')->prefix('admin')->middleware('is_admin')->group(function () {
    Route::resource('/orders', AdminOrderController::class);
    Route::resource('/services', AdminServiceController::class,);
   
    // Route::resource('/admin', AdminController::class);
});
Route::prefix('admin')->middleware('is_admin')->group(function () {
    
    Route::resource('/admines', AdminController::class);
    Route::resource('/users', UserController::class);
 
});





Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware('is_admin');
Route::resource('/admins', AdminController::class);
// Route::resource('/users', UserController::class);
