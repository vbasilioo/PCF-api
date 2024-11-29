<?php

use App\Http\Controllers\Served\ServedController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth.api'], 'type:ADMINISTRADOR,GESTÃO')->group(function (){
    Route::post('/', [ServedController::class, 'store']);
    Route::get('/', [ServedController::class, 'index']);
    Route::get('/{id}', [ServedController::class, 'show']);
    Route::put('/{id}', [ServedController::class, 'update']);
    Route::delete('/{id}', [ServedController::class, 'destroy']);
    Route::patch('/{id}', [ServedController::class, 'restore']);
});