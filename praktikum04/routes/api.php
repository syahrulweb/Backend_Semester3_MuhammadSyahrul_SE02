<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
# method get
use App\Http\Controllers\AnimalController;

// Method GET
Route::get('/animals', [AnimalController::class, 'index']);

// Method POST
Route::post('/animals/store', [AnimalController::class, 'store']);

// Method PUT
Route::put('/animals/{id}', [AnimalController::class, 'update']);
Route::put('/animals/update/{id}', [AnimalController::class, 'update']);

// Method DELETE
Route::delete('/animals/{id}', [AnimalController::class, 'destroy']);
