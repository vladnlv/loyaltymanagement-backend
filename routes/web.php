<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin/login', App\Entities\Admin\Http\Controllers\LoginController::class)->middleware('guest')->name('admin.login');
Route::post('/admin/login', App\Entities\Admin\Http\Controllers\AuthController::class)->middleware('guest')->name('admin.auth');

Route::get('{page}', \App\Http\Controllers\Client\IndexController::class)->where('page', '.*')->name('client');

