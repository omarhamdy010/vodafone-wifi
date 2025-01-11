<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/store', [UserController::class, 'store'])->name('store.user');
Route::post('/add-score', [UserController::class, 'addScore'])->name('add.score');
Route::get('/all-users', [UserController::class, 'allUser']);
Route::get('/export-users', [UserController::class, 'export'])->name('export');
Route::post('/import-users', [UserController::class, 'importUsers'])->name('import');

Auth::routes();
