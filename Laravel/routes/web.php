<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::group(['middleware' => ['guest']], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'showLogin')->name('login.show');
        Route::post('login', 'login')->name('login');
    });
});

Route::group(['middleware' => ['auth']], function () {
    // ホーム画面へ
    Route::get('home', function () {
        return view('home');
    })->name('home');

    // ログアウト
    Route::controller(AuthController::class)->group(function () {
        Route::post('logout', 'logout')->name('logout');
    });

});
