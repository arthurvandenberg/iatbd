<?php

use Illuminate\Support\Facades\Route;

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
Route::middleware(['blocked'])->group(function(){
    Route::get('/pets', [\App\Http\Controllers\PetController::class, 'index']);
    Route::get('/pets/{id}', [\App\Http\Controllers\PetController::class, 'show']);

    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
    Route::get('/users/{id}', [\App\Http\Controllers\UserController::class, 'show']);
    Route::get('/users/{user_id}/reviews', [\App\Http\Controllers\ReviewController::class, 'index']);
});

Route::middleware(['blocked', 'auth'])->group(function(){
    Route::post('/pets/create', [\App\Http\Controllers\PetController::class, 'store']);
    Route::delete('/pets/{id}/delete', [\App\Http\Controllers\PetController::class, 'delete']);

    Route::post('/users/reviews/store/{request_id}', [\App\Http\Controllers\ReviewController::class, 'store']);

    Route::post('/request/create', [\App\Http\Controllers\RequestController::class, 'store']);
    Route::patch('/request/{id}/accept', [\App\Http\Controllers\RequestController::class, 'accept']);
    Route::delete('/request/{id}/delete', [\App\Http\Controllers\RequestController::class, 'delete']);
    Route::patch('/request/{id}/finish', [\App\Http\Controllers\RequestController::class, 'finish']);

    Route::get('/listing/create/{pet_id}', [\App\Http\Controllers\ListingController::class, 'create']);
    Route::post('/listing/store', [\App\Http\Controllers\ListingController::class, 'store']);

    Route::post('/image/store', [\App\Http\Controllers\ImageController::class, 'store']);
    Route::delete('/image/{id}/delete', [\App\Http\Controllers\ImageController::class, 'delete']);
});

Route::middleware(['auth', 'admin', 'blocked'])->group(function(){
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index']);

    Route::patch('/admin/{id}/block', [\App\Http\Controllers\AdminController::class, 'blockUser']);
});

Route::get('/', function () {
    return view('home');
});

Route::get('/blocked_user', function(){
    return view('blocked');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'blocked'])->name('dashboard');

require __DIR__.'/auth.php';
