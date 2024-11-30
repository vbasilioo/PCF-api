<?php

use App\Http\Controllers\Address\AddressController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth.api', 'type:ADMINISTRADOR|GESTÃO'])->group(function (){
    Route::post('/', [AddressController::class, 'store']);
    Route::get('/', [AddressController::class, 'index']);
    Route::get('/{id}', [AddressController::class, 'show']);
    Route::put('/{id}', [AddressController::class, 'update']);
    Route::delete('/{id}', [AddressController::class, 'destroy']);
    Route::patch('/{id}', [AddressController::class, 'restore']);
});