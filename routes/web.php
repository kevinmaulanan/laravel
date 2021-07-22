<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
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

// *** Auth *** ///
Route::middleware(['NonAuthenticated'])->group(function () {
    Route::get('/auth/login', [Users::class, 'login_view']);
    Route::get('/auth/register', [Users::class, 'register_view']);

    Route::post('/auth/login', [Users::class, 'login_post']);
    Route::post('/auth/register', [Users::class, 'register_post']);
});

Route::middleware(['Authenticated'])->group(function () {
    Route::get('/home', [Users::class, 'home']);
    Route::get('/user/{id}', [Users::class, 'user_detail']);
    Route::get('/auth/logout', [Users::class, 'logout']);
});

