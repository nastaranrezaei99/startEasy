<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AdvertisementController;

Route::get('/events', [EventController::class, 'index']);

Route::post('/events', [EventController::class, 'store']);
Route::post('/events/{id}/join', [EventController::class, 'join']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Marktplatz Routes
|--------------------------------------------------------------------------
*/
Route::get('/advertisements', [AdvertisementController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/advertisements', [AdvertisementController::class, 'store']);
});