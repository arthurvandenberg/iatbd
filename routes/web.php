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

Route::get('/pets', [\App\Http\Controllers\PetController::class, 'index']);
Route::get('/pets/{id}', [\App\Http\Controllers\PetController::class, 'show']);
Route::post('/pets/create', [\App\Http\Controllers\PetController::class, 'store']);
Route::post('/pets/{id}/delete', [\App\Http\Controllers\PetController::class, 'destroy']);

Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
Route::get('/users/{id}', [\App\Http\Controllers\UserController::class, 'show']);
Route::get('/users/{user_id}/reviews', [\App\Http\Controllers\ReviewController::class, 'index']);
Route::get('/users/{user_id}/reviews/create/{pet_id}', [\App\Http\Controllers\ReviewController::class, 'create']);
Route::post('/users/reviews/store', [\App\Http\Controllers\ReviewController::class, 'store']);

Route::post('/request/create', [\App\Http\Controllers\RequestController::class, 'store']);
Route::post('/request/{id}/{owner_id}/accept', [\App\Http\Controllers\RequestController::class, 'accept']);
Route::post('/request/{id}/{owner_id}/delete', [\App\Http\Controllers\RequestController::class, 'delete']);
Route::post('/request/{id}/{owner_id}/finish', [\App\Http\Controllers\RequestController::class, 'finish']);

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
