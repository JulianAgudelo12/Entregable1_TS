<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminDashboardController@index')->name("admin.dashboard.index");
    Route::get('/admin/users', 'App\Http\Controllers\Admin\AdminUserController@index')->name("admin.users.index");
   });