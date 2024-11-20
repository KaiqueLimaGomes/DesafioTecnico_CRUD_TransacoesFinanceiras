<?php

namespace App\Http\Controllers;

use App\Models\Transacao; // Modelo da tabela transacoes
use Illuminate\Http\Request;

class TransacaoController extends Controller
{
    /**
     * Listar todas as transações.
     *
     * Retorna todas as transações do banco de dados,
     * incluindo o relacionamento com os tipos de transação.
     */
    public function index()
    {
            
        $transacoes = Transacao::with('tipo')->get(); // Recupera todas as transações com o tipo associado
        return response()->json($transacoes, 200); // Retorna como JSON
        
    }

    /**
     * Criar uma nova transação.
     *
     * Recebe dados via Request, valida e salva no banco.
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'descricao' => 'required|string|max:255', // Descrição obrigatória
            'valor' => 'required|numeric', // Valor obrigatório e deve ser numérico
            'tipo_id' => 'required|exists:tipos_transacao,id', // Deve referenciar um tipo existente
        ]);

        // Cria a transação com os dados validados
        $transacao = Transacao::create($validated);

        return response()->json($transacao, 201); // Retorna o recurso criado com status 201 (criado)
    }

    /**
     * Exibir uma transação específica.
     *
     * Retorna os detalhes de uma transação pelo ID.
     */
    public function show($id)
    {
        // Busca a transação pelo ID e inclui o tipo associado
        $transacao = Transacao::with('tipo')->find($id);

        // Verifica se a transação existe
        if (!$transacao) {
            return response()->json(['message' => 'Transação não encontrada'], 404); // Retorna erro 404
        }

        return response()->json($transacao, 200); // Retorna a transação encontrada
    }

    /**
     * Atualizar uma transação existente.
     *
     * Recebe dados via Request, valida e atualiza no banco.
     */
    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'descricao' => 'string|max:255', // Descrição opcional
            'valor' => 'numeric', // Valor opcional
            'tipo_id' => 'exists:tipos_transacao,id', // Tipo opcional, mas deve existir
        ]);

        // Busca a transação pelo ID
        $transacao = Transacao::find($id);

        // Verifica se a transação existe
        if (!$transacao) {
            return response()->json(['message' => 'Transação não encontrada'], 404); // Retorna erro 404
        }

        // Atualiza os dados validados
        $transacao->update($validated);

        return response()->json($transacao, 200); // Retorna a transação atualizada
    }

    /**
     * Deletar uma transação.
     *
     * Remove a transação especificada pelo ID.
     */
    public function destroy($id)
    {
        // Busca a transação pelo ID
        $transacao = Transacao::find($id);

        // Verifica se a transação existe
        if (!$transacao) {
            return response()->json(['message' => 'Transação não encontrada'], 404); // Retorna erro 404
        }

        // Exclui a transação
        $transacao->delete();

        return response()->json(['message' => 'Transação excluída com sucesso'], 200); // Confirma a exclusão
    }
}
