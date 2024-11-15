<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register',[AuthController::class,'registerUser']);
Route::post('/login',[AuthController::class,'loginUser']);
Route::post('/user-info',[AuthController::class,'getUserInfo']);
Route::post('/logout',[AuthController::class,'logoutUser'])->middleware('auth:sanctum');
