<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Admin\SuperAdminController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ClubController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SeasonController;
use App\Http\Controllers\Admin\LeagueController;
use App\Http\Controllers\Admin\GameController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


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
Route::middleware('auth:api')->group(function () {
    Route::middleware(['admin'])->prefix('admin')->group(function () {
        Route::resource('/superAdmin', SuperAdminController::class)->middleware('superAdmin');
        Route::resource('/city', CityController::class);
        Route::resource('/club', ClubController::class);
        Route::resource('/type', TypeController::class);
        Route::resource('/team', TeamController::class);
        Route::resource('/role', RoleController::class);
        Route::resource('/season', SeasonController::class);
        Route::resource('/league', LeagueController::class);
        Route::resource('/game', GameController::class);
    });

    Route::resource('/admin', AdminController::class)->middleware('admin');
});


Route::get('/email', [MailController::class, 'update'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('password/forgot', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('passwords.sent');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.reset');
