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

  <!-- TABELA 1: FILTROS -->
  <div class="filtros">
    <label>Data de Abertura:</label>
    <input type="text" id="dateRangePickerAbertura" />

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


    <label>Data de Fechamento:</label>
    <input type="text" id="dateRangePickerFechamento" />
  </div>

  <script>
    $(document).ready(function() {
      // Inicializa o date range picker para a data de abertura
      $('#dateRangePickerAbertura').daterangepicker({
        opens: 'left',
        locale: {
          format: 'DD/MM/YYYY',
          applyLabel: 'Aplicar',
          cancelLabel: 'Cancelar',
          fromLabel: 'De',
          toLabel: 'Para',
          customRangeLabel: 'Intervalo Personalizado',
          daysOfWeek: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
          monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
          firstDay: 1
        }
      });

      // Adiciona um evento quando o intervalo de datas de abertura é alterado
      $('#dateRangePickerAbertura').on('apply.daterangepicker', function(ev, picker) {
        var startDate = picker.startDate.format('DD/MM/YYYY');
        var endDate = picker.endDate.format('DD/MM/YYYY');

        console.log('Data de abertura - Início:', startDate);
        console.log('Data de abertura - Término:', endDate);

        // Adicione aqui a lógica para filtrar os dados com as datas de abertura selecionadas
      });

      // Inicializa o date range picker para a data de fechamento
      $('#dateRangePickerFechamento').daterangepicker({
        opens: 'left',
        locale: {
          format: 'DD/MM/YYYY',
          applyLabel: 'Aplicar',
          cancelLabel: 'Cancelar',
          fromLabel: 'De',
          toLabel: 'Para',
          customRangeLabel: 'Intervalo Personalizado',
          daysOfWeek: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
          monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
          firstDay: 1
        }
      });

      // Adiciona um evento quando o intervalo de datas de fechamento é alterado
      $('#dateRangePickerFechamento').on('apply.daterangepicker', function(ev, picker) {
        var startDate = picker.startDate.format('DD/MM/YYYY');
        var endDate = picker.endDate.format('DD/MM/YYYY');

        console.log('Data de fechamento - Início:', startDate);
        console.log('Data de fechamento - Término:', endDate);

        // Adicione aqui a lógica para filtrar os dados com as datas de fechamento selecionadas
      });
    });
  </script>

<!-- TABELA 2 -->
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
                <th class="table-header">Serviço</th>
                <th class="table-header">Data do pedido</th>
                <th class="table-header">Descrição do pedido</th>
                <th class="table-header">Solicitante</th>
                <th class="table-header">Data de fechamento</th>
                <th class="table-header">Ação</th>
              </tr>
            </thead>

            @foreach($ordens as $ordem)
            <tbody>
              <tr>
                <td>{{ $ordem->cd_solicitacao }}</td>
                <td>{{ $ordem->nm_servico_solicitado }}</td>

                <!--strtotime é usada para analisar datas em formato de texto -->
                <td>{{  date_format($ordem->dt_entrega_solicitacao, 'd/m/Y') }}</td>
                <td>{{ $ordem->ds_solicitacao }}</td>
                <td>{{ $ordem->cd_matricula_funcionario }}</td>
                <td>{{ date('d/m/Y'), strtotime($ordem->dt_entrega_solicitacao) }}</td>
                <td>
                <form action="export/{{ $ordem -> cd_solicitacao}}" method="GET">
                  <button class="edit-button-bold">Exportar</button>
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