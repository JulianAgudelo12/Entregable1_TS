<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$HomeControllerPath = 'App\Http\Controllers\HomeController';
$ComputerControllerPath = 'App\Http\Controllers\ComputerController';

Auth::routes();

Route::get('/', "$HomeControllerPath@index")->name('home.index');
Route::get('/computers', "$ComputerControllerPath@index")->name('computer.index');
Route::get('/computers/{id}', "$ComputerControllerPath@show")->name('computer.show');

Route::middleware('admin')->group(function () {
    $AdminDashboardControllerPath = 'App\Http\Controllers\Admin\AdminDashboardController';
    $AdminUserCOntrollerPath = 'App\Http\Controllers\Admin\AdminUserController';
    $AdminComputerControllerPath = 'App\Http\Controllers\Admin\AdminComputerController';

    Route::get('/admin', "$AdminDashboardControllerPath@index")->name('admin.dashboard.index');
    Route::get('/admin/users', "$AdminUserCOntrollerPath@index")->name('admin.user.index');
    Route::get('/admin/computers', "$AdminComputerControllerPath@index")->name('admin.computer.index');
    Route::get('/admin/computers/create', "$AdminComputerControllerPath@create")->name('admin.computer.create');
    Route::post('/admin/computers/create', "$AdminComputerControllerPath@store")->name('admin.computer.store');
    Route::get('/admin/computers/{id}', "$AdminComputerControllerPath@show")->name('admin.computer.show');
    Route::delete('/admin/computers/{id}', "$AdminComputerControllerPath@delete")->name('admin.computer.delete');
});
