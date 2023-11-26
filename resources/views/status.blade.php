@extends('dashboard.tecnico')

@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Status da Solicitação</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lista.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th:nth-child(1), td:nth-child(1) {
            width: 10%;
        }

        th:nth-child(2), td:nth-child(2) {
            width: 20%;
        }

        th:nth-child(3), td:nth-child(3) {
            width: 15%;
        }

        th:nth-child(4), td:nth-child(4) {
            width: 15%;
        }

        th:nth-child(5), td:nth-child(5) {
            width: 20%;
        }

        th:nth-child(6), td:nth-child(6) {
            width: 20%;
        }

        #filtros {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<!-- TABELA 1: FILTROS -->
<div class="filtros" style="margin-top: 20px; color: white;">
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

<body>
        <!-- Filtros
        <div class="filtros">
            <label for="descricaoFiltro">Filtrar por Descrição:</label>
            <input type="text" id="descricaoFiltro" oninput="filtrarTabela()">

            <label for="dataFiltro">Filtrar por Data:</label>
            <input type="date" id="dataFiltro" onchange="filtrarTabela()">

            <label for="statusFiltro">Filtrar por Status:</label>
            <select id="statusFiltro" onchange="filtrarTabela()">
                <option value="">Todos</option>
                <option value="Aberta">Aberta</option>
                <option value="Atribuída">Atribuída</option>
                <option value="Em andamento">Em andamento</option>
            </select>
        </div> -->
    <div id="content" class="ordens">
        <!-- Tabela de Dados -->
        <h2>Dados da Solicitação</h2>
        <table id="tabela-dados">
            <thead>
                <tr>
                    <th>Número da Solicitação</th>
                    <th>Descrição</th>
                    <th>Data de Entrega</th>
                    <th>Matrícula do Funcionário</th>
                    <th>Serviço Solicitado</th>
                    <th>Status</th> <!-- Nova Coluna -->
                </tr>
            </thead>
            <tbody id="tabela-corpo">
                @foreach ($dadosSolicitacao as $solicitacao)
                    @if ($solicitacao->cd_matricula_funcionario == Session::get('codigoDoUsuario'))
                        <tr>
                            <td>{{ $solicitacao->cd_ordem }}</td>
                            <td>{{ $solicitacao->ds_ordem}}</td>
                            <td>{{ date_format($solicitacao->dt_entrega_ordem, 'd/m/Y') }}</td>
                            <td>{{ $solicitacao->cd_responsavel }}</td>
                            <td>{{ $solicitacao->nm_servico_solicitado }}</td>
                            <td>
                                <select class="status-dropdown" data-solicitacao-id="{{ $solicitacao->cd_solicitacao }}">
                                    <option value="Aberta" {{ $solicitacao->status == 'Aberta' ? 'selected' : '' }}>Aberta</option>
                                    <option value="Atribuída" {{ $solicitacao->status == 'Atribuída' ? 'selected' : '' }}>Atribuída</option>
                                    <option value="Em andamento" {{ $solicitacao->status == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                                    <!-- Adicione mais opções conforme necessário -->
                                </select>
                            </td>
                        </tr>
                    @endif
                @endforeach

                @if ($dadosSolicitacao->where('cd_matricula_funcionario', Session::get('codigoDoUsuario'))->isEmpty())
                    <tr>
                        <td colspan="6">Nenhuma solicitação encontrada para este usuário.</td>
                    </tr>
                @endif
            </tbody>
        </table>
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
