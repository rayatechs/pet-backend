<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\RegisterController;
use \App\Http\Controllers\Api\LoginController;
use \App\Http\Controllers\Api\PetController;
use \App\Http\Controllers\Api\BreedController;
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



Route::prefix('auth')->name('auth.')->group(function () {
    Route::post('register',   [RegisterController::class, 'register'])->name('register');
    Route::post('login',      [LoginController::class, 'login'])->name('login');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('pet')->name('pet')->group(function () {
        Route::get('/', [PetController::class, 'all'])->name('all');
        Route::post('/', [PetController::class, 'create'])->name('create');
        Route::patch('/{pet}', [PetController::class, 'update'])->name('update');
        Route::delete('/{pet}', [PetController::class, 'delete'])->name('delete');
    });


    Route::prefix('breed')->name('breed')->group(function () {
        Route::get('/', [BreedController::class, 'all'])->name('all');
    });
});
