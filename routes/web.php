<?php

use App\Http\Controllers\VerdurasController;
use App\Models\verduras;
use Illuminate\Support\Facades\Route;

Route::get('/',[VerdurasController::class,'index'])->name('index');
Route::get('/nuevo',[VerdurasController::class, 'nuevo'])->name('verdura.nuevo');
Route::post('/',[VerdurasController::class, 'guardar'])->name('verdura.guardar');
Route::get('/verduras/cambiar-estado/{id}', [VerdurasController::class, 'cambiarEstado'])->name('verdura.cambiarEstado');
Route::get('/editar/{id}',[VerdurasController::class,'editar'])->name('verdura.editar');
Route::put('/guardaredit/{id}',[VerdurasController::class,'guardaredit'])->name('verdura.guardaredit');