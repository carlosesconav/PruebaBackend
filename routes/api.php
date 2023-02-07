<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::post('register', [AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);

Route::middleware(['auth:sanctum'])->group(function () {

Route::get('logout', [AuthController::class,'logout']);
Route::get('favorites',[FavoritesController::class,'index']);
Route::get('edit/{id}',[UserController::class,'edit']);
Route::put('update/{id}',[UserController::class,'update']); 

});