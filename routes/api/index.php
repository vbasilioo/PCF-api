<?php

use App\Builder\ReturnApi;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return ReturnApi::success([], 'API rodando.');
});

Route::prefix('/auth')->group(base_path('routes/api/auth.php'));

Route::prefix('/users')->group(base_path('routes/api/user.php'));

Route::prefix('/address')->group(base_path('routes/api/address.php'));

Route::prefix('/departments')->group(base_path('routes/api/department.php'));

Route::prefix('/financial')->group(base_path('routes/api/financial.php'));

Route::prefix('/served')->group(base_path('routes/api/served.php'));

Route::prefix('/request')->group(base_path('routes/api/request.php'));

Route::prefix('/news')->group(base_path('routes/api/news.php'));

Route::prefix('/round')->group(base_path('routes/api/round.php'));