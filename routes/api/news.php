<?php

use App\Http\Controllers\News\NewsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth.api', 'log.actions'], 'type:ADMINISTRADOR,GESTÃO')->group(function (){
    Route::post('/', [NewsController::class, 'store']);
    Route::get('/', [NewsController::class, 'index']);
    Route::get('/{id}', [NewsController::class, 'show']);
    Route::put('/{id}', [NewsController::class, 'update']);
    Route::delete('/{id}', [NewsController::class, 'destroy']);
    Route::patch('/{id}', [NewsController::class, 'restore']);
});