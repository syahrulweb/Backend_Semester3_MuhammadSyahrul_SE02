<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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


// pekan 5 
Route::get('/students', [StudentController::class, 'index']);
Route::post('/students/store', [StudentController::class, 'store']);

Route::put('/students/{id}', [StudentController::class, 'update']);

Route::delete('/students/{id}', [StudentController::class, 'destroy']);

