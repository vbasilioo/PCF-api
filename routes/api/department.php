<?php

use App\Http\Controllers\Department\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::middleware('log.actions')->group(function (){
    Route::post('/', [DepartmentController::class, 'store']);
});

Route::middleware(['auth.api', 'log.actions'], 'type:ADMINISTRADOR,GESTÃO')->group(function (){
    Route::get('/', [DepartmentController::class, 'index']);
    Route::get('/{id}', [DepartmentController::class, 'show']);
    Route::put('/{id}', [DepartmentController::class, 'update']);
    Route::delete('/{id}', [DepartmentController::class, 'destroy']);
    Route::patch('/{id}', [DepartmentController::class, 'restore']);
});