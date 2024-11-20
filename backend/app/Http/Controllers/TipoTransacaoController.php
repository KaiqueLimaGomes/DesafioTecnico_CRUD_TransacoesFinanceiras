<?php

namespace App\Http\Controllers;

use App\Models\TipoTransacao;
use Illuminate\Http\Request;

class TipoTransacaoController extends Controller
{
    // Listar todos os tipos de transação
    public function index()
    {
        $tipos = TipoTransacao::all(); // Recupera todos os tipos
        return response()->json($tipos, 200); // Retorna como JSON
    }

    // Criar um novo tipo de transação
    public function store(Request $request)
    {
        // Validação do campo 'descricao'
        $validated = $request->validate([
            'descricao' => 'required|string|max:255',
        ]);

        // Criação do novo tipo de transação
        $tipo = TipoTransacao::create($validated);

        return response()->json($tipo, 201); // Retorna o recurso criado
    }

    // Exibir um tipo de transação específico
    public function show($id)
    {

            // Busca o tipo com todas as transações associadas
        $tipo = TipoTransacao::with('transacoes')->find($id);

        if (!$tipo) {
            return response()->json(['message' => 'Tipo de transação não encontrado'], 404); // Erro 404
        }

        return response()->json($tipo, 200); // Retorna o tipo atualizado

    }

    // Atualizar um tipo de transação
    public function update(Request $request, $id)
    {
        // Validação do campo 'descricao'
        $validated = $request->validate([
            'descricao' => 'string|max:255',
        ]);

        $tipo = TipoTransacao::find($id); // Busca o tipo pelo ID

        if (!$tipo) {
            return response()->json(['message' => 'Tipo de transação não encontrado'], 404); // Erro 404
        }

        // Atualiza os dados do tipo de transação
        $tipo->update($validated);

        return response()->json($tipo, 200); // Retorna o tipo atualizado
    }

    // Excluir um tipo de transação
    public function destroy($id)
    {
        $tipo = TipoTransacao::find($id); // Busca o tipo pelo ID

        if (!$tipo) {
            return response()->json(['message' => 'Tipo de transação não encontrado'], 404); // Erro 404
        }

        $tipo->delete(); // Exclui o tipo de transação

        return response()->json(['message' => 'Tipo de transação excluído com sucesso'], 200); // Confirma a exclusão
    }
}
