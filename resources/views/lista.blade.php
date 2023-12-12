@extends('dashboard.coordenador')

@yield('links-sidebar')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/lista.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <title>Tabela de Ordem de Serviço</title>
</head>

<body>
<!-- TABELA DE ORDENS -->
<div class="ordens">
      @if(session('msg'))
      <p class="msg">{{ session('msg')}}</p>
      @endif
    <body>
    <div class="ordens" style="max-height: calc(100vh - 60px); overflow-y: auto;">
      <div class="ordem-servico-container">
        </a>
        <h2>Lista de ordens de serviço</h2>
        <div class="user-table">
          <table>
            <thead>
              <tr>
                <th class="table-header">Código</th>
                <th class="table-header">Solicitante</th>
                <th class="table-header">Nome do Solcitante</th>
                <th class="table-header">Serviço</th>
                <th class="table-header">Data de emissão da solicitação</th>
                <th class="table-header">Descrição do pedido</th>
                <th class="table-header">Status de Atribuição</th>
                <th class="table-header">Ação</th>
              </tr>
            </thead>

            @foreach($ordens as $ordem)
            <tbody>
              <tr>
                <td>{{ $ordem->cd_solicitacao }}</td>
                <td>{{ $ordem->cd_matricula_funcionario }}</td>
                <td>{{ $ordem->funcionario->nm_funcionario }}</td>
                <td>{{ $ordem->nm_servico_solicitado }}</td>

                <!--strtotime é usada para analisar datas em formato de texto -->
                <td>{{  date_format($ordem->dt_emissao_solicitacao, 'd/m/Y') }}</td>
                <td>{{ $ordem->ds_solicitacao }}</td>
                <td>
                    @if($ordem->ordem)
                    Atribuído
                    @else
                    Não Atribuído
                    @endif
                </td>
                <td>
                <form action="export/{{ $ordem -> cd_solicitacao}}" method="GET">
                  <button class="edit-button-bold">Atribuir</button>
                  </form>
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
    </body>

</html>
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


<script>
  // Adicione aqui a lógica para a ação de logout
  document.getElementById('logout').addEventListener('click', function() {
    // Adicione a lógica de deslogar o usuário
    alert('Usuário deslogado!');
  });
</script>
@endsection('content')