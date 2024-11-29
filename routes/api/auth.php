<?php

use App\Http\Controllers\Authentication\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::group([], function () {
    Route::post('/login', [AuthenticationController::class, 'login']);
});