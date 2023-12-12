<!-- Layout dinâmico pela variável $layout através fo StatusController-->
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

<!-- Tabela de Dados -->
<div id="content" class="ordens">
    <!-- Título da tabela de dados -->
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
            <!-- Loop para exibir dados de ordens -->
            @foreach ($ordens as $ordem)
            @if($ordem->tecnico->cd_matricula_funcionario == Session::get('codigoDoUsuario'))
            <form action="{{ route('atualizar-ordem') }}" method="POST" onsubmit="salvarDataLocal()">
            @csrf
            <!-- Linha da tabela com dados da ordem -->
                <tr>
                    <td>{{ $ordem->cd_ordem_servico }}</td>
                    <td>{{ $ordem->cd_solicitacao }}</td>
                    <td>{{ $ordem->ds_material_utilizado_ordem_servico }}</td>
                    <td>{{ $ordem->cd_responsavel }}</td>
                    <td style="display: none;">{{ $ordem->tecnico->cd_matricula_funcionario }}</td>
                    <td>
                        <!-- Input para a data de entrega da ordem -->
                        <input type="hidden" name="cd_solicitacao" value="{{ $ordem->cd_solicitacao }}">
                        <label for="dt_entrega_ordem_servico">Data atual: {{ $ordem->dt_entrega_ordem_servico->format('d/m/Y') }}</label>
                        <input type="date" class="date" name="dt_entrega_ordem_servico" id="dt_entrega_ordem_servico" value="{{ old('dt_entrega_ordem_servico', $ordem->dt_entrega_ordem_servico) }}">
                    </td>
                    <td>
                        <!-- Dropdown para selecionar o status da ordem -->
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
                        <!-- Botão para enviar o formulário e salvar a ordem -->
                        <input type="submit" class="edit-button-bold" style="width: 80px;" value="Salvar">
                    </td>
                </tr>
            </form>
            @endif
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
</script>
@endsection('content')