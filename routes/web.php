<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\{
    AdminController,
    BalanceController,
};

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

Auth::routes();

Route::get('/', [SiteController::class, 'index'])->name('site');

Route::group([
    'prefix' => '/admin',
    'middleware' => ['auth'],
], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::group([
        'prefix' => '/saldo',
        'middleware' => ['auth'],
    ], function () {
        Route::get('/', [BalanceController::class, 'index'])->name('admin.balance.index');
    });
});
