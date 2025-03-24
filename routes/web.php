<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$HomeControllerPath = 'App\Http\Controllers\HomeController';
$ComputerControllerPath = 'App\Http\Controllers\ComputerController';
$ItemControllerPath = 'App\Http\Controllers\ItemController';
$WishlistControllerPath = 'App\Http\Controllers\WishlistController';
$OrderControllerPath = 'App\Http\Controllers\OrderController';

Auth::routes();

Route::get('/', "$HomeControllerPath@index")->name('home.index');
Route::get('/computers', "$ComputerControllerPath@index")->name('computer.index');
Route::get('/computers/{id}', "$ComputerControllerPath@show")->name('computer.show');

Route::post('/items', "$ItemControllerPath@store")->name('items.store');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index'); // temp
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index'); // temp

Route::middleware('admin')->group(function () {
    $AdminDashboardControllerPath = 'App\Http\Controllers\Admin\AdminDashboardController';
    $AdminUserControllerPath = 'App\Http\Controllers\Admin\AdminUserController';
    $AdminComputerControllerPath = 'App\Http\Controllers\Admin\AdminComputerController';

    Route::get('/admin', "$AdminDashboardControllerPath@index")->name('admin.dashboard.index');

    Route::get('/admin/users', "$AdminUserControllerPath@index")->name('admin.user.index');
    Route::delete('/admin/users/{id}', "$AdminUserControllerPath@destroy")->name('admin.user.destroy');
    Route::get('/admin/users/{id}/edit', "$AdminUserControllerPath@edit")->name('admin.user.edit');
    Route::put('/admin/users/{id}', "$AdminUserControllerPath@update")->name('admin.user.update');

    Route::get('/admin/computers', "$AdminComputerControllerPath@index")->name('admin.computer.index');
    Route::get('/admin/computers/create', "$AdminComputerControllerPath@create")->name('admin.computer.create');
    Route::post('/admin/computers/create', "$AdminComputerControllerPath@store")->name('admin.computer.store');
    Route::get('/admin/computers/{id}', "$AdminComputerControllerPath@show")->name('admin.computer.show');
    Route::delete('/admin/computers/{id}', "$AdminComputerControllerPath@destroy")->name('admin.computer.destroy');
    Route::get('/admin/computers/{id}/edit', "$AdminComputerControllerPath@edit")->name('admin.computer.edit');
    Route::put('/admin/computers/{id}', "$AdminComputerControllerPath@update")->name('admin.computer.update');

});
