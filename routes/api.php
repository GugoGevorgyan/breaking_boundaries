<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Admin\SuperAdminController;
use App\Http\Controllers\Admin\AdminController;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('/user')->middleware('auth:api')->group(function () {
    Route::resource('/', UserController::class);
});

Route::middleware('auth:api')->group(function (){
    Route::resource('/superAdmin', SuperAdminController::class)->middleware('superAdmin');
    Route::put('/status/{admin}', [SuperAdminController::class, 'status'])->middleware('superAdmin');
    Route::resource('/admin', AdminController::class)->middleware('admin');
});


Route::resource('/mail', MailController::class);
Route::resource('/login', LoginController::class);
Route::resource('/register', RegisterController::class);

