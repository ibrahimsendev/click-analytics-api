<?php

use App\Http\Controllers\Api\ClickController;
use Illuminate\Support\Facades\Route;

Route::prefix('clicks')->group(function () {
    Route::post('/', [ClickController::class, 'store']);
    Route::get('/{url}', [ClickController::class, 'index']);
    Route::get('/{url}/count', [ClickController::class, 'count']);
});