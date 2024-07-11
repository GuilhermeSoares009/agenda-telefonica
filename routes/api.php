<?php

use App\Http\Controllers\AgendaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('agenda')->group(function () {
    Route::post('/agenda', [AgendaController::class, 'store']);
    Route::put('/agenda/{id}', [AgendaController::class, 'update']);
    Route::delete('/agenda/{id}', [AgendaController::class, 'destroy']);
});