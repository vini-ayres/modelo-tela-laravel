<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;
use App\Models\OrdemServico;

class SolicitacaoController extends Controller
{
    public function processForm()
    {
        $pedido = new Solicitacao;
        $pedido->cd_solicitacao = request('cd_solicitacao');
        $pedido->ds_solicitacao = request('ds_solicitacao');
        $pedido->cd_matricula_funcionario = request('cd_matricula_funcionario');
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

        $pedido->save();

        // Redirecione para uma página de sucesso ou faça algo mais
        return redirect()->back()->with('success', 'Solicitação Nº ' . $pedido->cd_solicitacao . ' enviada com sucesso!');
    }

    private function enviarEmailSucesso(Solicitacao $pedido)
    {
        $resultadoEnvio = Mail::to($pedido->nm_email_institucional_funcionario)
            ->send(new \App\Mail\SolicitacaoEnviada($pedido));

        if ($resultadoEnvio) {
            return redirect()->back()->with('success', 'Solicitação Nº ' . $pedido->cd_solicitacao . ' enviada com sucesso! Email enviado.');
        } else {
            $failures = Mail::failures();
            return redirect()->back()->with('error', 'Erro ao enviar o email. Detalhes: ' . implode(', ', $failures));
        }
    }


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