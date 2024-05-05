<?php

use App\Http\Controllers\DeveloperController;
use App\Http\Middleware\DeveloperMiddleware;
use App\Http\Controllers\GenreController;
use App\Http\Middleware\GenreMiddleware;
use App\Http\Controllers\GameController;
use App\Http\Middleware\GameMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [GameController::class, 'index']);

Route::prefix('developer')->controller(DeveloperController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/add', 'add');
    Route::get('/update/{id}', 'update');
    Route::post('/update/{id}', 'update');
    Route::post('/save', 'save')->middleware(DeveloperMiddleware::class);
    Route::get('/delete/{id}', 'delete');
    Route::post('/delete/{id}', 'delete');
});

Route::prefix('genre')->controller(GenreController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/add', 'add');
    Route::get('/update/{id}', 'update');
    Route::post('/update/{id}', 'update');
    Route::post('/save', 'save')->middleware(GenreMiddleware::class);
    Route::get('/delete/{id}', 'delete');
    Route::post('/delete/{id}', 'delete');
});

Route::prefix('game')->controller(GameController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/add', 'add');
    Route::get('/update/{id}', 'update');
    Route::post('/update/{id}', 'update');
    Route::post('/save', 'save')->middleware(GameMiddleware::class);
    Route::get('/delete/{id}', 'delete');
    Route::post('/delete/{id}', 'delete');
});


