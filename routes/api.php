<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [App\Http\Controllers\Api\AuthApiController::class, 'login'])->name('login');
});
Route::group(['middleware' => ['has_token']], function () {

    Route::post('task/store',  [App\Http\Controllers\Api\TaskController::class, 'storeTask']);
    Route::post('task/piority/update',  [App\Http\Controllers\Api\TaskController::class, 'updatePiority']);


});
