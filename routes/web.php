<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', [GiftController::class, 'index'])->name('home');
Route::get('/export-gifts', [GiftController::class, 'export'])->name('export');
Route::get('/all-gifts', [GiftController::class, 'allGift']);
Route::post('/store', [GiftController::class, 'store'])->name('store.gift');

Auth::routes();

