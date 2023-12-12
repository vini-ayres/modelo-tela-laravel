<!-- Layout dinâmico pela variável $layout através do controlador 'dashboard.coordenador' -->
@extends('dashboard.coordenador')

<!-- Inclui seção de links para a barra lateral -->
@yield('links-sidebar')

<!-- Início da seção de conteúdo -->
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadados da página -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Estilos CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lista.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    
    <!-- Título da página -->
    <title>Tabela de Ordem de Serviço</title>
</head>
<body>

<!-- TABELA 2 -->
<div class="ordens">
    <!-- Exibe mensagem de sucesso caso exista -->
    @if(session('msg'))
        <p class="msg">{{ session('msg')}}</p>
    @endif
    
    <!-- Corpo da página -->
    <body>
        <div class="ordens" style="max-height: calc(100vh - 60px); overflow-y: auto;">
            <div class="ordem-servico-container">
                <!-- Título da lista de técnicos -->
                <h2>Lista de técnicos</h2>
                
                <!-- Tabela de técnicos -->
                <div class="user-table">
                    <table>
                        <!-- Cabeçalho da tabela -->
                        <thead>
                            <tr>
                                <th class="table-header">Código do Técnico</th>
                                <th class="table-header">Código de Matrícula do Funcionário</th>
                                <th class="table-header">Nome do Técnico</th>
                                <th class="table-header">Email Institucional do Técnico</th>
                            </tr>
                        </thead>

                        <!-- Loop para exibir os técnicos -->
                        @foreach($tecnicos as $tecnico)
                            <tbody>
                                <tr>
                                    <td>{{ $tecnico->cd_responsavel }}</td>
                                    <td>{{ $tecnico->cd_matricula_funcionario }}</td>
                                    <td>{{ $tecnico->funcionario->nm_funcionario }}</td>
                                    <td>{{ $tecnico->funcionario->nm_email_institucional_funcionario }}</td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </body>

</html>

<!-- Script JavaScript para ação de logout -->
<script>
    // Adicione aqui a lógica para a ação de logout
    document.getElementById('logout').addEventListener('click', function() {
        // Adicione a lógica de deslogar o usuário
        alert('Usuário deslogado!');
    });
</script>

<!-- Fim da seção de conteúdo -->
@endsection('content')