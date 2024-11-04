<?php

use App\Http\Controllers\EmergenciaController;
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::middleware('auth')->group(function () {
    Route::get('/emergencias', [EmergenciaController::class, 'index'])->name('emergencias.index');
    Route::post('/emergencias', [EmergenciaController::class, 'store'])->name('emergencias.store');
});