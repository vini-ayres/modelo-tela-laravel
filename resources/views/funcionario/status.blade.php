@extends('dashboard.funcionario')

@section('content')

<!doctype html>
<html>
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
    </style>
</head>

<body>
    <div id="content">
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
                    <!-- Adicione mais colunas conforme necessário -->
                </tr>
            </thead>
            <tbody id="tabela-corpo">
                @foreach ($dadosSolicitacao as $solicitacao)
                    @if ($solicitacao->cd_matricula_funcionario == Session::get('codigoDoUsuario'))
                        <tr>
                            <td>{{ $solicitacao->cd_solicitacao }}</td>
                            <td>{{ $solicitacao->ds_solicitacao }}</td>
                            <td>{{ $solicitacao->dt_entrega_solicitacao }}</td>
                            <td>{{ $solicitacao->cd_matricula_funcionario }}</td>
                            <td>{{ $solicitacao->nm_servico_solicitado }}</td>
                            <!-- Adicione mais colunas conforme necessário -->
                        </tr>
                    @endif
                @endforeach

                @if ($dadosSolicitacao->where('cd_matricula_funcionario', Session::get('codigoDoUsuario'))->isEmpty())
                    <tr>
                        <td colspan="5">Nenhuma solicitação encontrada para este usuário.</td>
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