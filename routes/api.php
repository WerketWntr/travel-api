<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/api/v1/login', \App\Http\Controllers\Api\V1\Auth\LoginController::class);

Route::prefix('/api/v1/admin')->middleware(['auth:sanctum', 'role:admin'])->group(function (){
    Route::post('/travels', [\App\Http\Controllers\Api\V1\Admin\TravelController::class, 'store']);
    Route::post('/travels/{travel}/tours', [\App\Http\Controllers\Api\V1\Admin\TourController::class, 'store']);
});


Route::get('/api/v1/travels', [\App\Http\Controllers\Api\V1\TravelController::class, 'index']);
Route::get('/api/v1/travels/{travel:slug}/tours', [\App\Http\Controllers\Api\V1\TourController::class, 'index']);
