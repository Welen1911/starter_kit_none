<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::apiResource('/', UserController::class);

Route::post('/', [UserController::class, 'store']);

Route::get('/', [UserController::class, 'index'])
->middleware('auth:sanctum');
