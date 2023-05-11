<?php

use App\Http\Controllers\Api\V1\AboutController;
use App\Http\Controllers\Api\V1\BlogController;
use App\Http\Controllers\Api\V1\ContactController;
use App\Http\Controllers\Api\V1\SettingsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('blogs', BlogController::class);
Route::apiResource('about', AboutController::class);
Route::apiResource('contact', ContactController::class)->middleware('token');
Route::apiResource('settings', SettingsController::class);