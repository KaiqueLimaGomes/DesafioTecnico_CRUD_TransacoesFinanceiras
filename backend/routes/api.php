<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransacaoController;
use App\Http\Controllers\TipoTransacaoController;

// Grupo de rotas para API
Route::prefix('api')->group(function () {
    Route::apiResource('transacoes', TransacaoController::class);
    Route::apiResource('tipos-transacao', TipoTransacaoController::class);
});
