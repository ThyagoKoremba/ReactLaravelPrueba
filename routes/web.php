<?php

use App\Http\Controllers\VerdurasController;
use App\Models\verduras;
use Illuminate\Support\Facades\Route;

Route::prefix('verduras')->group(function () {
    Route::get('/', [VerdurasController::class, 'index']);
    Route::post('/', [VerdurasController::class, 'guardar']);
    Route::get('/{id}', [VerdurasController::class, 'show']);
    Route::put('/{id}', [VerdurasController::class, 'guardaredit']);
    Route::patch('/{id}/estado', [VerdurasController::class, 'cambiarEstado']);
});