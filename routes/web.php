<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\BlackListController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PublicController::class, 'index']);
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('/login/authentication', [
    LoginController::class,
    'authentication',
]);
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', LogoutController::class);
    Route::prefix('blacklist')->group(function () {
        Route::get('/', [BlackListController::class, 'index']);
        Route::get('/create', [BlackListController::class, 'create']);
        Route::get('/edit/{blackList}', [BlackListController::class, 'edit']);
        Route::get('/detail/{blackList}', [BlackListController::class, 'show']);
        Route::post('/store', [BlackListController::class, 'store']);

        Route::delete('/delete/{blackList}', [
            BlackListController::class,
            'destroy',
        ]);
    });
    Route::prefix('user')
        ->middleware('admin')
        ->group(function () {
            Route::get('/', [UserController::class, 'index']);
            Route::get('/create', [UserController::class, 'create']);
            Route::get('/edit/{user}', [UserController::class, 'edit']);
            Route::get('/detail/{user}', [UserController::class, 'show']);
            Route::post('/store', [UserController::class, 'store']);
            Route::delete('/delete/{user}', [UserController::class, 'destroy']);
        });

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index']);
        Route::post('/store', [ProfileController::class, 'store']);
        Route::prefix('change-password')->group(function () {
            Route::get('/', [ProfileController::class, 'changePassword']);
            Route::post('/store', [
                ProfileController::class,
                'storeChangePassword',
            ]);
        });
    });
});
