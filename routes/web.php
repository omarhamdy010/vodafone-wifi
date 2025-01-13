<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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


Route::get('/all-users', [UserController::class, 'allUser']);
Route::get('/export-users', [UserController::class, 'export'])->name('export');
Route::post('/import-users', [UserController::class, 'importUsers'])->name('import');
