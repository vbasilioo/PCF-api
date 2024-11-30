<?php

use App\Http\Controllers\Round\RoundController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth.api', 'type:ADMINISTRADOR|GESTÃO'])->group(function (){
    Route::post('/', [RoundController::class, 'store']);
    Route::get('/', [RoundController::class, 'index']);
    Route::get('/{id}', [RoundController::class, 'show']);
    Route::put('/{id}', [RoundController::class, 'update']);
    Route::delete('/{id}', [RoundController::class, 'destroy']);
    Route::patch('/{id}', [RoundController::class, 'restore']);
});