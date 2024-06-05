<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\CarController;




Route::get('/', function () {
    return redirect()->route('cars.index');
});

Route::get("/mensagem/{mensagem}", [MensagemController::class, 'mostrarMensagem']);

Route::resource('cars', CarController::class);
Route::post('/cars/create', [CarController::class, 'create'])->name('cars.create');
