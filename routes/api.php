<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\FilmController;
use App\Http\Controllers\Api\V1\GenreController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->prefix('v1')->group(function () {
    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->controller(FilmController::class)->prefix('v1/films')->as('films')->group(function (
) {
    Route::get('/', 'index');
    Route::get('/show', 'show');
    Route::post('/store', 'store');
    Route::put('/update', 'update');
    Route::delete('/delete', 'destroy');
    Route::put('/publish', 'publish');
});

Route::middleware('auth:sanctum')->controller(GenreController::class)->prefix('v1/genres')->as('films')->group(function (
) {
    Route::get('/', 'index');
    Route::get('/show', 'show');
    Route::post('/store', 'store');
    Route::put('/update', 'update');
    Route::delete('/delete', 'destroy');
    Route::get('/films', 'films');
});