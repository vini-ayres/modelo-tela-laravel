@extends('dashboard.tecnico')

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

        #filtros {
            margin-bottom: 20px;
        }

        #status {
            width: 150px;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

    </style>
</head>
<body>

<!-- Filtros -->
<div class="filtros" style="margin-top: 20px; margin-right: 50px;">
    <label for="descricaoFiltro">Filtrar por Descrição:</label>
    <input type="text" id="descricaoFiltro">

    <label for="dataFiltro">Filtrar por Data:</label>
    <input type="date" id="dataFiltro">

    <label for="statusFiltro">Filtrar por Status:</label>
    <select id="statusFiltro">
        <option value="">Todos</option>
        <option value="Aberta">Aberta</option>
        <option value="Atribuída">Atribuída</option>
        <option value="Em andamento">Em andamento</option>
    </select>
    <nbsp></nbsp>
    <nbsp></nbsp>
    <nbsp></nbsp>
    <nbsp></nbsp>
    <nbsp></nbsp>
    <nbsp></nbsp>
    <nbsp></nbsp>
</div>

<!-- Tabela de Dados -->
<div id="content" class="ordens">
    <h2>Dados da Solicitação</h2>
    <table id="tabela-dados">
        <thead>
            <tr>
                <th>Número da Ordem</th>
                <th>Número da Solicitação</th>
                <th>Descrição do Material Utilizado</th>
                <th>Número do Técnico</th>
                <th>Status do Pedido</th> <!-- Nova Coluna -->
            </tr>
        </thead>
        <tbody id="tabela-corpo">
            @foreach ($dadosOrdem as $ordem)
                <tr>
                    <td>{{ $ordem->cd_ordem_servico }}</td>
                    <td>{{ $ordem->cd_solicitacao }}</td>
                    <td>{{ $ordem->ds_material_utilizado_ordem_servico }}</td>
                    <td>{{ $ordem->cd_tecnico }}</td>
                    <td>
                        <form method="POST" style="text-align: center;" action="{{ route('atualizar-status') }}">
                            @csrf
                            <input type="hidden" name="cd_solicitacao" value="{{ $ordem->cd_solicitacao }}">
                            <select id="status" name="status" class="status-dropdown">
                                <option value="Aberta" {{ $ordem->nm_status_ordem_servico == 'Aberta' ? 'selected' : '' }}>Aberta</option>
                                <option value="Atribuída" {{ $ordem->nm_status_ordem_servico == 'Atribuída' ? 'selected' : '' }}>Atribuída</option>
                                <option value="Em andamento" {{ $ordem->nm_status_ordem_servico == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                                <!-- Adicione mais opções conforme necessário -->
                            </select>
                            <input type="submit" class="edit-button-bold" style="width: 150px;" value="Salvar">
                        </form>
                    </td>
                </tr>
            @endforeach
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
