@extends($layout)

@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status da Solicitação</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lista.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
        table {
            width: 90%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: 50px;
            margin-right: auto;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        #filtros {
            margin-bottom: 20px;
        }

        #select {
            width: 150px;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .date {
            width: 130px;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<!-- Filtros
<div class="filtros" style="margin-top: 20px; margin-right: 50px; color: white; right: 60px;">
    <label for="descricaoFiltro">Filtrar por Descrição:</label>
    <input type="text" id="descricaoFiltro">

    <label for="dataFiltro">Filtrar por Data:</label>
    <input type="date" id="dataFiltro">

    <label for="statusFiltro">Filtrar por Status:</label>
    <select id="statusFiltro">
        <option value="">Todos</option>
        <option value="Aberto">Aberto</option>
        <option value="Em andamento">Em andamento</option>
        <option value="Pausado">Pausado</option>
        <option value="Concluído">Concluído</option>
        <option value="Cancelado">Cancelado</option>
        <option value="Reaberto">Reaberto</option>
        <option value="Atrasado">Atrasado</option>
        <option value="Esperando material">Esperando material</option>
    </select>
</div> -->

<!-- Tabela de Dados -->
<div id="content" class="ordens">
    <h2>Dados da Ordem de Serviço</h2>
    <table id="tabela-dados">
        <thead>
            <tr>
                <th>Número da ordem</th>
                <th>Número da solicitação</th>
                <th>Descrição do material utilizado</th>
                <th>Número do responsável</th>
                <th>Data de entrega da ordem</th>
                <th>Status do pedido</th>
                <th>Salvar ordem</th>
            </tr>
        </thead>
        <tbody id="tabela-corpo">
        @foreach ($ordens as $ordem)
        <form action="{{ route('atualizar-ordem') }}" method="POST" id="form-atualizar-ordem" onsubmit="salvarDataLocal()">
        @csrf
                <tr>
                    <td>{{ $ordem->cd_ordem_servico }}</td>
                    <td>{{ $ordem->cd_solicitacao }}</td>
                    <td>{{ $ordem->ds_material_utilizado_ordem_servico }}</td>
                    <td>{{ $ordem->cd_responsavel }}</td>
                    <td style="display: none;">{{ $ordem->tecnico->cd_matricula_funcionario }}</td>
                    <td>
                        <input type="hidden" name="cd_solicitacao" value="{{ $ordem->cd_solicitacao }}">
                        <label for="dt_entrega_ordem_servico">Data atual: {{ $ordem->dt_entrega_ordem_servico->format('d/m/Y') }}</label>
                        <input type="date" class="date" name="dt_entrega_ordem_servico" id="dt_entrega_ordem_servico" value="{{ old('dt_entrega_ordem_servico', $ordem->dt_entrega_ordem_servico) }}">
                    </td>
                    <td>
                        <input type="hidden" name="cd_solicitacao" value="{{ $ordem->cd_solicitacao }}">
                        <select id="select" name="status" class="status-dropdown">
                            <option id="abertaOption" value="Aberto" {{ $ordem->nm_status_ordem_servico == 'Aberta' ? 'selected' : '' }}>Aberto</option>
                            <option id="andamentoOption" value="Em andamento" {{ $ordem->nm_status_ordem_servico == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                            <option id="pausadoOption" value="Pausado" {{ $ordem->nm_status_ordem_servico == 'Pausado' ? 'selected' : '' }}>Pausado</option>
                            <option id="concluidoOption" value="Concluído" {{ $ordem->nm_status_ordem_servico == 'Concluído' ? 'selected' : '' }}>Concluído</option>
                            <option id="canceladoOption" value="Cancelado" {{ $ordem->nm_status_ordem_servico == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                            <option id="reabertoOption" value="Reaberto" {{ $ordem->nm_status_ordem_servico == 'Reaberto' ? 'selected' : '' }}>Reaberto</option>
                            <option id="atrasadoOption" value="Atrasado" {{ $ordem->nm_status_ordem_servico == 'Atrasado' ? 'selected' : '' }}>Atrasado</option>
                            <option id="esperandoOption" value="Esperando material" {{ $ordem->nm_status_ordem_servico == 'Esperando material' ? 'selected' : '' }}>Esperando material</option>
                            <!-- Adicione mais opções conforme necessário -->
                        </select>
                    </td>
                    <td>
                        <input type="submit" class="edit-button-bold" style="width: 80px;" value="Salvar">
                    </td>
                </tr>
            </form>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>

<script>
    document.getElementById('logout').addEventListener('click', function() {
        alert('Usuário deslogado!');
    });

    var originalData = []; // Armazena os dados originais da tabela

    // Preenche o array originalData com os dados da tabela
    var rows = document.getElementById('tabela-corpo').getElementsByTagName('tr');
    for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].getElementsByTagName('td');
        var rowData = {
            descricao: cells[2].innerText.toLowerCase(),
            data: cells[3].innerText,
            status: cells[4].getElementsByTagName('select')[0].value.toLowerCase()
        };
        originalData.push(rowData);
    }

    // Adiciona ouvintes de eventos aos elementos de filtro
    document.getElementById('descricaoFiltro').addEventListener('input', filtrarTabela);
    document.getElementById('dataFiltro').addEventListener('input', filtrarTabela);
    document.getElementById('statusFiltro').addEventListener('change', filtrarTabela);

    function filtrarTabela() {
        var descricaoFiltro = document.getElementById('descricaoFiltro').value.toLowerCase();
        var dataFiltro = document.getElementById('dataFiltro').value;
        var statusFiltro = document.getElementById('statusFiltro').value.toLowerCase();

        var linhas = document.getElementById('tabela-corpo').getElementsByTagName('tr');

        for (var i = 0; i < linhas.length; i++) {
            var colunas = linhas[i].getElementsByTagName('td');
            var mostrarLinha = true;

            // Filtro por Descrição
            var descricao = originalData[i].descricao;
            if (descricao.indexOf(descricaoFiltro) === -1) {
                mostrarLinha = false;
            }

            // Filtro por Data
            var data = originalData[i].data;
            if (dataFiltro && data !== dataFiltro) {
                mostrarLinha = false;
            }

            // Filtro por Status
            var status = originalData[i].status;
            if (statusFiltro && status !== statusFiltro) {
                mostrarLinha = false;
            }

            // Ocultar ou mostrar a linha com base nos filtros
            linhas[i].style.display = mostrarLinha ? '' : 'none';
        }
    }
</script>
@endsection('content')