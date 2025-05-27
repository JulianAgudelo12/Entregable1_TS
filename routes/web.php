<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$HomeControllerPath = 'App\Http\Controllers\HomeController';
$ComputerControllerPath = 'App\Http\Controllers\ComputerController';
$PC_ComponentControllerPath = 'App\Http\Controllers\PC_ComponentController';
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

// PC_Component Routes
Route::get('/pc_components', "$PC_ComponentControllerPath@index")->name('pc_component.index');
Route::get('/pc_components/{id}', "$PC_ComponentControllerPath@show")->name('pc_component.show');

// Order Routes
Route::get('/orders/create', "$OrderControllerPath@create")->name('order.create');
Route::get('/orders/{id}', "$OrderControllerPath@show")->name('order.show');

// Item Routes
Route::get('/items', "$ItemControllerPath@index")->name('items.index');
Route::get('/items/{id}', "$ItemControllerPath@show")->name('items.show');
Route::post('/items', "$ItemControllerPath@store")->name('items.store');
Route::delete('/order/item/{id}', "$ItemControllerPath@removeFromOrder")->name('order.item.remove');
Route::put('/order/item/{id}/quantity', "$ItemControllerPath@updateQuantity")->name('order.item.updateQuantity');
Route::put('/items/{id}/quantity', "$ItemControllerPath@updateQuantity")->name('items.updateQuantity');

// Wishlist Routes
Route::get('/wishlist', "$WishlistControllerPath@index")->name('wishlist.index');
Route::post('/wishlist', "$WishlistControllerPath@store")->name('wishlist.store');
Route::delete('/wishlist/{id}', "$WishlistControllerPath@remove")->name('wishlist.remove');

Route::get('/orders', ["$OrderControllerPath@index"])->name('orders.index');

Route::middleware('admin')->group(function () {
    $AdminDashboardControllerPath = 'App\Http\Controllers\Admin\AdminDashboardController';
    $AdminUserControllerPath = 'App\Http\Controllers\Admin\AdminUserController';
    $AdminComputerControllerPath = 'App\Http\Controllers\Admin\AdminComputerController';
    $AdminPC_ComponentControllerPath = 'App\Http\Controllers\Admin\AdminPC_ComponentController';

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

    // PC_Component Routes
    Route::get('/admin/pc_components', "$AdminPC_ComponentControllerPath@index")->name('admin.pc_component.index');
    Route::get('/admin/pc_components/create', "$AdminPC_ComponentControllerPath@create")->name('admin.pc_component.create');
    Route::post('/admin/pc_components', "$AdminPC_ComponentControllerPath@store")->name('admin.pc_component.store');
    Route::get('/admin/pc_components/{id}', "$AdminPC_ComponentControllerPath@show")->name('admin.pc_component.show');
    Route::delete('/admin/pc_components/{id}', "$AdminPC_ComponentControllerPath@destroy")->name('admin.pc_component.destroy');
    Route::get('/admin/pc_components/{id}/edit', "$AdminPC_ComponentControllerPath@edit")->name('admin.pc_component.edit');
    Route::put('/admin/pc_components/{id}', "$AdminPC_ComponentControllerPath@update")->name('admin.pc_component.update');

});
