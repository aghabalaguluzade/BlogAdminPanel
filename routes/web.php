<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|

*/
// Route::prefix('admin')->group(function() {
//     Route::view('/','index')->name('home');
//     Route::resource('blogs',BlogController::class);
// })->middleware('admin');

// Route::group(['middleware' => 'auth'],function() {
//     Route::group([
//         'prefix' => 'admin',
//         'middleware' => 'admin',
//         'as' => 'admin'
//     ],function() {
//         Route::view('/','index')->name('home');
//         Route::resource('blogs',BlogController::class);
//     });
// });



Route::prefix('admin')->group(function() {
    Route::view('/','index')->name('home');
    Route::resource('blogs',BlogController::class);
    Route::put('blogs/updateStatus/{id}', [BlogController::class, 'updateStatus'])->name('blogs.updateStatus');
});