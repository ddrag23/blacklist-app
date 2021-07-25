<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BlackListController;
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

Route::get('/', function () {
    return view('welcome');
});
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
        Route::post('/store', [BlackListController::class, 'store']);

        Route::delete('/delete/{blackList}', [
            BlackListController::class,
            'destroy',
        ]);
    });
    Route::get('/user', [UserController::class, 'index']);
});
