<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FinanceiroController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Rota para teste da API.
Route::get('/', function () {
    return response()->json(['status' => 'OK'], 200);
});


Route::prefix('financeiro')->group(function () {
    Route::get('/', [FinanceiroController::class, 'index']); // Listar todos os registros
    Route::post('/', [FinanceiroController::class, 'store']); // Criar um novo registro
    Route::get('/{id}', [FinanceiroController::class, 'show']); // Mostrar um registro específico
    Route::put('/{id}', [FinanceiroController::class, 'update']); // Atualizar um registro
    Route::delete('/{id}', [FinanceiroController::class, 'destroy']); // Deletar um registro
});