<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('reset-password', 'App\Http\Controllers\PasswordResetController@sendMail')->name('resetpasswordApi');
Route::get('reset-password/{token}', 'App\Http\Controllers\PasswordResetController@reset');
Route::get('hello', 'App\Http\Controllers\PasswordResetController@hello');
