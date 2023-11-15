@extends('dashboard.tecnico')

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
<input type="text" id="dateRangePickerAbertura"/>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<label>Status:</label>
<select id="statusFilter">
    <option value="Não Iniciado">Não Iniciado</option>
    <option value="Em Processo">Em Processo</option>
    <option value="Cancelado">Cancelado</option>
    <option value="Concluído">Concluído</option>
</select>

<label>Responsável:</label>
<select id="responsavelFilter">
    <option value="João">João</option>
    <option value="Maria">Maria</option>
    <option value="Carlos">Carlos</option>
    <option value="Isabel">Isabel</option>
    <option value="Ricardo">Ricardo</option>
    <option value="Fernanda">Fernanda</option>
    <option value="Pedro">Pedro</option>
    <option value="Mariana">Mariana</option>
    <option value="Gabriel">Gabriel</option>
    <option value="Laura">Laura</option>
    <option value="André">André</option>
    <option value="Susana">Susana</option>
</select>

<label>Data de Fechamento:</label>
<input type="text" id="dateRangePickerFechamento"/>
</div>

<script>
    $(document).ready(function () {
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
        $('#dateRangePickerAbertura').on('apply.daterangepicker', function (ev, picker) {
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
        $('#dateRangePickerFechamento').on('apply.daterangepicker', function (ev, picker) {
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
<body>
  <div class="ordem-servico-container">
    </a>
    <h2>Lista de ordens de serviço</h2>
    <div class="user-table">
      <table>
        <thead>
          <tr>
            <th class="table-header">Serviço</th>
            <th class="table-header">Data do pedido</th>
            <th class="table-header">Descrição do pedido</th>
            <th class="table-header">Responsável</th>
            <th class="table-header">Data de fechamento</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Elétrica</td>
            <td>12/04/2023</td>
            <td>Substituição de dispositivos elétricos danificados.</td>
            <td>Vinicius</td>
            <td>
              <button class="edit-button-bold">Exportar</button>
              <button class="delete-button">Editar</button>
            </td>
          </tr>
          <tr>
            <td>Pintura</td>
            <td>20/05/2023</td>
            <td>Pintura das paredes da classe 241.</td>
            <td>Matheus</td>
            <td>
              <button class="edit-button-bold">Exportar</button>
              <button class="delete-button">Editar</button>
            </td>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>
<script>
    // Adicione aqui a lógica para a ação de logout
    document.getElementById('logout').addEventListener('click', function() {
        // Adicione a lógica de deslogar o usuário
        alert('Usuário deslogado!');
    });
</script>
@endsection('content')