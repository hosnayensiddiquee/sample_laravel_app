<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', 'UserRegistrationController@index');
Route::post('/store', 'UserRegistrationController@store')->name('user.save');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

