<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/me', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login');

Route::delete('/logout', [AuthController::class, 'logout'])
->name('logout')
->middleware('auth:sanctum');

Route::prefix('/user')->group(
    base_path('/routes/user.php')
);
