<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$HomeControllerPath = 'App\Http\Controllers\HomeController';
$ComputerControllerPath = 'App\Http\Controllers\ComputerController';
$ComponentControllerPath = 'App\Http\Controllers\ComponentController';
$ItemControllerPath = 'App\Http\Controllers\ItemController';
$WishlistControllerPath = 'App\Http\Controllers\WishlistController';
$OrderControllerPath = 'App\Http\Controllers\OrderController';

Auth::routes();

// Home Routes
Route::get('/', "$HomeControllerPath@index")->name('home.index');

// Computer Routes
Route::get('/computers', "$ComputerControllerPath@index")->name('computer.index');
Route::get('/computers/{id}', "$ComputerControllerPath@show")->name('computer.show');
Route::get('/compare', "$ComputerControllerPath@compare")->name('computer.compare');

// Component Routes
Route::get('/components', "$ComponentControllerPath@index")->name('component.index');
Route::get('/components/{id}', "$ComponentControllerPath@show")->name('component.show');

// Admin Routes
Route::post('/items', "$ItemControllerPath@store")->name('items.store');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index'); // temp
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index'); // temp

Route::middleware('admin')->group(function () {
    $AdminDashboardControllerPath = 'App\Http\Controllers\Admin\AdminDashboardController';
    $AdminUserControllerPath = 'App\Http\Controllers\Admin\AdminUserController';
    $AdminComputerControllerPath = 'App\Http\Controllers\Admin\AdminComputerController';
    $AdminComponentControllerPath = 'App\Http\Controllers\Admin\AdminComponentController';

    Route::get('/admin', "$AdminDashboardControllerPath@index")->name('admin.dashboard.index');

    // User Routes
    Route::get('/admin/users', "$AdminUserControllerPath@index")->name('admin.user.index');
    Route::delete('/admin/users/{id}', "$AdminUserControllerPath@destroy")->name('admin.user.destroy');
    Route::get('/admin/users/{id}/edit', "$AdminUserControllerPath@edit")->name('admin.user.edit');
    Route::put('/admin/users/{id}', "$AdminUserControllerPath@update")->name('admin.user.update');

    // Computer Routes
    Route::get('/admin/computers', "$AdminComputerControllerPath@index")->name('admin.computer.index');
    Route::get('/admin/computers/create', "$AdminComputerControllerPath@create")->name('admin.computer.create');
    Route::post('/admin/computers/create', "$AdminComputerControllerPath@store")->name('admin.computer.store');
    Route::get('/admin/computers/{id}', "$AdminComputerControllerPath@show")->name('admin.computer.show');
    Route::delete('/admin/computers/{id}', "$AdminComputerControllerPath@destroy")->name('admin.computer.destroy');
    Route::get('/admin/computers/{id}/edit', "$AdminComputerControllerPath@edit")->name('admin.computer.edit');
    Route::put('/admin/computers/{id}', "$AdminComputerControllerPath@update")->name('admin.computer.update');

    // Component Routes
    Route::get('/admin/components', "$AdminComponentControllerPath@index")->name('admin.component.index');
    Route::get('/admin/components/create', "$AdminComponentControllerPath@create")->name('admin.component.create');
    Route::post('/admin/components', "$AdminComponentControllerPath@store")->name('admin.component.store');
    Route::get('/admin/components/{id}', "$AdminComponentControllerPath@show")->name('admin.component.show');
    Route::delete('/admin/components/{id}', "$AdminComponentControllerPath@destroy")->name('admin.component.destroy');
    Route::get('/admin/components/{id}/edit', "$AdminComponentControllerPath@edit")->name('admin.component.edit');
    Route::put('/admin/components/{id}', "$AdminComponentControllerPath@update")->name('admin.component.update');

});
