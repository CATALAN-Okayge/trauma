<?php

use App\Http\Controllers\EmergenciaController;
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/', function () {
    return redirect()->route('login');
});




Route::middleware('auth')->group(function () {
    Route::get('/emergencias', [EmergenciaController::class, 'index'])->name('emergencias.index');
    Route::post('/emergencias', [EmergenciaController::class, 'store'])->name('emergencias.store');
});


Route::post('/update-status', function (Illuminate\Http\Request $request) {
    $user = Auth::user();
    $user->estado = $request->estado;
    $user->save();

    return response()->json(['success' => true]);
})->name('update-status')->middleware('auth');

