<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

$HomeControllerPath ='App\Http\Controllers\HomeController';

Auth::routes();

Route::get('/', "$HomeControllerPath@index")->name('home.index');

Route::middleware('admin')->group(function () {
    $AdminDashboardControllerPath ='App\Http\Controllers\Admin\AdminDashboardController';
    $AdminUserCOntrollerPath = 'App\Http\Controllers\Admin\AdminUserController';

    Route::get('/admin', "$AdminDashboardControllerPath@index")->name('admin.dashboard.index');
    Route::get('/admin/users', "$AdminUserCOntrollerPath@index")->name('admin.users.index');
});
