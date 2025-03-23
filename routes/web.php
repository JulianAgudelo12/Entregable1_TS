<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/computers', 'App\Http\Controllers\ComputerController@index')->name('computer.index');
Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminDashboardController@index')->name('admin.dashboard.index');
    Route::get('/admin/users', 'App\Http\Controllers\Admin\AdminUserController@index')->name('admin.user.index');
    Route::get('/admin/computer', 'App\Http\Controllers\Admin\AdminComputerController@index')->name('admin.computer.index');
    Route::get('/admin/computer/create', 'App\Http\Controllers\Admin\AdminComputerController@create')->name('admin.computer.create');
});
