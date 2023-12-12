@extends('dashboard.coordenador')

@yield('links-sidebar')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Configuração da página -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/lista.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <title>Tabela de Ordem de Serviço</title>
</head>

<body>
<!-- TABELA DE ORDENS -->
<div class="ordens">
    <!-- Exibição de mensagem (se houver) -->
    @if(session('msg'))
    <p class="msg">{{ session('msg')}}</p>
    @endif

    <body> <!-- Duplicação desnecessária de <body> -->

    <!-- Container para listar as ordens de serviço -->
    <div class="ordens" style="max-height: calc(100vh - 60px); overflow-y: auto;">
      <div class="ordem-servico-container">
        <!-- Título da página -->
        </a> <!-- Tag de fechamento ausente, pode ser um erro -->

        <h2>Lista de ordens de serviço</h2>

        <!-- Tabela para exibir as ordens de serviço -->
        <div class="user-table">
          <table>
            <thead>
              <!-- Cabeçalhos da tabela -->
              <tr>
                <th class="table-header">Código</th>
                <th class="table-header">Solicitante</th>
                <th class="table-header">Nome do Solicitante</th>
                <th class="table-header">Serviço</th>
                <th class="table-header">Data de emissão da solicitação</th>
                <th class="table-header">Descrição do pedido</th>
                <th class="table-header">Status de Atribuição</th>
                <th class="table-header">Ação</th>
              </tr>
            </thead>

            <!-- Loop para exibir as linhas da tabela com os dados das ordens -->
            @foreach($ordens as $ordem)
            <tbody>
              <tr>
                <td>{{ $ordem->cd_solicitacao }}</td>
                <td>{{ $ordem->cd_matricula_funcionario }}</td>
                <td>{{ $ordem->funcionario->nm_funcionario }}</td>
                <td>{{ $ordem->nm_servico_solicitado }}</td>

                <!-- Formatação da data utilizando date_format -->
                <td>{{  date_format($ordem->dt_emissao_solicitacao, 'd/m/Y') }}</td>

                <td>{{ $ordem->ds_solicitacao }}</td>
                <td>
                    <!-- Verificação do status de atribuição -->
                    @if($ordem->ordem)
                    Atribuído
                    @else
                    Não Atribuído
                    @endif
                </td>
                <td>
                  <!-- Formulário para exportar a ordem de serviço -->
                  <form action="export/{{ $ordem -> cd_solicitacao}}" method="GET">
                    <button class="edit-button-bold">Atribuir</button>
                  </form>

                  <!-- Formulário para editar a ordem de serviço -->
                  <form action="edit/{{ $ordem -> cd_solicitacao}}" method="GET">
                    <button class="delete-button">Editar</button>
                  </form>
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
      </div>
    </div>
    </body> <!-- Duplicação desnecessária de <body> -->

</html>

<!-- Script para esconder a lista de tarefas ao enviar o formulário -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var exportarForm = document.getElementById('exportarForm');

        if (exportarForm) {
            exportarForm.addEventListener('submit', function () {
                // Esconda a lista de tarefas ao enviar o formulário
                var listaTarefas = document.getElementById('suaListaDeTarefas'); // substitua 'suaListaDeTarefas' pelo ID real da sua lista
                if (listaTarefas) {
                    listaTarefas.style.display = 'none';
                }
            });
        }
    });
</script>

<!-- Script para ação de logout -->
<script>
  document.getElementById('logout').addEventListener('click', function() {
    // Adicione a lógica de deslogar o usuário
    alert('Usuário deslogado!');
  });
</script>

@endsection('content')