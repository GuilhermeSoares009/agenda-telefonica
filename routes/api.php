<?php

use App\Http\Controllers\AgendaController;
use App\Http\Middleware\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware([Agenda::class])->group(function () {
    Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
    Route::post('/agenda/store', [AgendaController::class, 'store'])->name('agenda.store');
    Route::put('/agenda/{agenda}', [AgendaController::class, 'update'])->name('agenda.update');
    Route::delete('/agenda/{agenda}', [AgendaController::class, 'destroy'])->name('agenda.destroy');
});