<?php

use App\Http\Controllers\Api\V1\BlogController;
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


// Route::get('/', [BlogController::class, 'home'])->name('home');
// Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
// Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blog');
// Route::get('/search', [BlogController::class, 'search'])->name('search');
// Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
// Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
// Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::apiResource('/blogs', BlogController::class);