<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;
use App\Models\OrdemServico;
use Illuminate\Support\Facades\Session;

class SolicitacaoController extends Controller
{
    // Método para processar o formulário de solicitação
    public function processForm()
    {
        // Obtém a matrícula do funcionário da sessão
        $cd_matricula_funcionario = Session::get('codigoDoUsuario');

        // Cria uma nova instância de Solicitacao e preenche com os dados do formulário
        $pedido = new Solicitacao;
        $pedido->cd_solicitacao = request('cd_solicitacao');
        $pedido->ds_solicitacao = request('ds_solicitacao');
        $pedido->cd_matricula_funcionario = $cd_matricula_funcionario;
        $pedido->dt_emissao_solicitacao = now(); // Use a função now() para obter a data e hora atuais
        $pedido->nm_servico_solicitado = request('nm_servico_solicitado');

        // Verifica se a opção "Outro" foi selecionada
        if (request('nm_servico_solicitado') === 'outro') {
            // Se sim, salva o serviço personalizado digitado pelo usuário
            $pedido->nm_servico_solicitado = request('tipo_outro');
        } else {
            // Caso contrário, salva a opção padrão selecionada
            $pedido->nm_servico_solicitado = request('nm_servico_solicitado');
        }

        // Salva a solicitação no banco de dados
        $pedido->save();

        // Redireciona para uma página de sucesso ou executa outra ação
        return redirect()->back()->with('success', 'Solicitação Nº ' . $pedido->cd_solicitacao . ' enviada com sucesso!');
    }

    // Métodos para exibir a tabela de solicitações para diferentes perfis de usuários
    
    public function funcionario()
    {
        $ordens = Solicitacao::with('ordem')->get();
        $layout = 'dashboard.funcionario';
        return view('tabela-solicitacoes', ['ordens' => $ordens, 'layout' => $layout]);
    }

    public function tecnico()
    {
        $ordens = Solicitacao::with('ordem')->get();
        $layout = 'dashboard.tecnico';
        return view('tabela-solicitacoes', ['ordens' => $ordens, 'layout' => $layout]);
    }

    public function coordenador()
    {
        $ordens = Solicitacao::with('ordem')->get();
        $layout = 'dashboard.coordenador';
        return view('tabela-solicitacoes', ['ordens' => $ordens, 'layout' => $layout]);
    }

    public function administrador()
    {
        $ordens = Solicitacao::with('ordem')->get();
        $layout = 'dashboard.administrador';
        return view('tabela-solicitacoes', ['ordens' => $ordens, 'layout' => $layout]);
    }
}
