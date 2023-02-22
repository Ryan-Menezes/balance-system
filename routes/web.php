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
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::group([
        'prefix' => '/saldo',
        'middleware' => ['auth'],
    ], function () {
        Route::get('/', [BalanceController::class, 'index'])->name('admin.balance');

        Route::get('/depositar', [BalanceController::class, 'deposit'])->name('admin.balance.deposit');
        Route::post('/depositar', [BalanceController::class, 'depositStore'])->name('admin.balance.deposit.store');

        Route::get('/sacar', [BalanceController::class, 'withdraw'])->name('admin.balance.withdraw');
        Route::post('/sacar', [BalanceController::class, 'withdrawStore'])->name('admin.balance.withdraw.store');

        Route::get('/transferir', [BalanceController::class, 'transfer'])->name('admin.balance.transfer');
        Route::post('/transferir/confirmar', [BalanceController::class, 'confirmTransfer'])->name('admin.balance.transfer.confirm');
        Route::post('/transferir', [BalanceController::class, 'transferStore'])->name('admin.balance.transfer.store');
    });
});
