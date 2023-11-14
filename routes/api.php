<?php

use App\Http\Controllers\Api\AlarmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\RegisterController;
use \App\Http\Controllers\Api\LoginController;
use \App\Http\Controllers\Api\PetController;
use \App\Http\Controllers\Api\BreedController;
use \App\Http\Controllers\Api\EventController;
use App\Models\Alarm;

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
        Route::get('/{pet}', [PetController::class, 'show'])->name('show');
        Route::post('/', [PetController::class, 'create'])->name('create');
        Route::patch('/{pet}', [PetController::class, 'update'])->name('update');
        Route::delete('/{pet}', [PetController::class, 'delete'])->name('delete');
    });


    Route::prefix('breed')->name('breed')->group(function () {
        Route::get('/', [BreedController::class, 'all'])->name('all');
    });


    Route::prefix('alarm')->name('alarm')->group(function () {
        Route::get('/', [AlarmController::class, 'all'])->name('all');
        Route::get('/{alarm}', [AlarmController::class, 'show'])->name('show');
        Route::post('/', [AlarmController::class, 'create'])->name('create');
        Route::patch('/{alarm}', [AlarmController::class, 'update'])->name('update');
        Route::delete('/{alarm}', [AlarmController::class, 'delete'])->name('delete');
    });

    Route::prefix('event')->name('event')->group(function () {
        Route::get('/', [\App\Http\Controllers\Api\EventController::class, 'get'])->name('get');
        Route::post('/' , [EventController::class, 'create'])->name('create');
    });
});
