<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Admin\SuperAdminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthenticationController;
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
    Route::post('/reset-password-token', [AuthenticationController::class,'resetPassword'])->name('reset-password-token');
    Route::post('/forgot-password', [AuthenticationController::class,'sendPasswordResetToken'])->name('reset-password');
    Route::post('/new-password', [AuthenticationController::class,'setNEwAccountPassword'])->name('new-account-password');

});

Route::middleware('auth:api')->group(function (){
    Route::resource('/superAdmin', SuperAdminController::class)->middleware('superAdmin');
    Route::put('/status/{admin}', [SuperAdminController::class, 'status'])->middleware('superAdmin');
    Route::resource('/admin', AdminController::class)->middleware('admin');
});


Route::resource('/mail', MailController::class);
Route::resource('/login', LoginController::class);
Route::resource('/register', RegisterController::class);

