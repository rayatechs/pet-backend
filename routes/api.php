<?php

use App\Http\Controllers\Api\AlarmController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\RegisterController;
use \App\Http\Controllers\Api\LoginController;
use \App\Http\Controllers\Api\PetController;
use \App\Http\Controllers\Api\BreedController;
use \App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\UserController;
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


    Route::apiResources([
        'alarm' => AlarmController::class,
        'pet'   => PetController::class,

    ]);

    Route::resource('user', UserController::class)->only([
        'show', 'update'
    ]);

    Route::post('pet/{pet}/upload-avatar', [PetController::class, 'uploadAvatar'])->name('pet.upload.avatar');

    Route::prefix('breed')->name('breed')->group(function () {
        Route::get('/', [BreedController::class, 'all'])->name('all');
    });
    Route::prefix('event')->name('event')->group(function () {
        Route::get('/', [\App\Http\Controllers\Api\EventController::class, 'get'])->name('get');
        Route::post('/', [EventController::class, 'create'])->name('create');
    });
});
