<?php

namespace App\Http\Controllers;

use App\Models\Financeiro;
use Illuminate\Http\Request;

class FinanceiroController extends Controller
{
    // Listar todos os registros
    public function index()
    {
        return response()->json(Financeiro::all(), 200);
    }

    // Criar um novo registro
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo_de_insercao' => 'required|string',
            'titulo' => 'required|string',
            'valor' => 'required|string',
            'descricao' => 'nullable|string',
        ]);

        $financeiro = Financeiro::create($validated);

        return response()->json($financeiro, 201);
    }

    // Mostrar um registro específico
    public function show($id)
    {
        $financeiro = Financeiro::find($id);

        if (!$financeiro) {
            return response()->json(['error' => 'Registro não encontrado'], 404);
        }

        return response()->json($financeiro, 200);
    }

    // Atualizar um registro existente
    public function update(Request $request, $id)
    {
        $financeiro = Financeiro::find($id);

        if (!$financeiro) {
            return response()->json(['error' => 'Registro não encontrado'], 404);
        }

        $validated = $request->validate([
            'tipo_de_insercao' => 'required|string',
            'titulo' => 'required|string',
            'valor' => 'required|string',
            'descricao' => 'nullable|string',
        ]);

        $financeiro->update($validated);

        return response()->json($financeiro, 200);
    }

    // Deletar um registro
    public function destroy($id)
    {
        $financeiro = Financeiro::find($id);

        if (!$financeiro) {
            return response()->json(['error' => 'Registro não encontrado'], 404);
        }

        $financeiro->delete();

        return response()->json(['message' => 'Registro excluído com sucesso'], 200);
    }
}


