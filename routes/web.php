<?php

use App\Http\Controllers\EmergenciaController;

Route::get('/', [EmergenciaController::class, 'index'])->name('emergencias.index');

Route::post('/emergencias', [EmergenciaController::class, 'store'])->name('emergencias.store');
