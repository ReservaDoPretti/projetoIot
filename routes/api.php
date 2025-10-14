<?php

use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SensorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/registro/create', [RegistroController::class,"store"]);

Route::get('/sensor/find', [SensorController::class,"find"]);

Route::put('/sensor/update', [SensorController::class,"update"]);
