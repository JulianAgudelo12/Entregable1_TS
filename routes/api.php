<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

$ComputerApiControllerPath = 'App\Http\Controllers\Api\ComputerApiController';

Route::get('/computers', "$ComputerApiControllerPath@index")->name('api.computer.index');
Route::get('/computers/{id}', "$ComputerApiControllerPath@show")->name('api.computer.show');
