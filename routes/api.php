<?php

use App\Http\Controllers\MessagingController;
use App\Http\Controllers\AuthController;
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

Route::post('/register', [AuthController::class, 'register']);

Route::post('/messages', [MessagingController::class, 'store']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/messages', [MessagingController::class, 'index']);
    Route::get('/messages/{id}', [MessagingController::class, 'show']);
    Route::get('/messages/search/{q}', [MessagingController::class, 'search']);
    Route::put('/messages/{id}', [MessagingController::class, 'update']);
    Route::delete('/messages/{id}', [MessagingController::class, 'destroy']);
    Route::post('/logout',[AuthController::class,'logout']);

 });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
