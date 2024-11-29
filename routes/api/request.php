<?php

use App\Http\Controllers\Request\RequestController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth.api'], 'type:ADMINISTRADOR,GESTÃO')->group(function (){
    Route::post('/', [RequestController::class, 'store']);
    Route::get('/', [RequestController::class, 'index']);
    Route::get('/{id}', [RequestController::class, 'show']);
    Route::put('/{id}', [RequestController::class, 'update']);
    Route::delete('/{id}', [RequestController::class, 'destroy']);
    Route::patch('/{id}', [RequestController::class, 'restore']);
});