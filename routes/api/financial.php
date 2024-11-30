<?php

use App\Http\Controllers\Financial\FinancialController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth.api', 'log.actions'], 'type:ADMINISTRADOR,GESTÃO')->group(function (){
    Route::post('/', [FinancialController::class, 'store']);
    Route::get('/', [FinancialController::class, 'index']);
    Route::get('/{id}', [FinancialController::class, 'show']);
    Route::put('/{id}', [FinancialController::class, 'update']);
    Route::delete('/{id}', [FinancialController::class, 'destroy']);
    Route::patch('/{id}', [FinancialController::class, 'restore']);
});