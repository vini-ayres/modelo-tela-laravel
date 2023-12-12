<!-- Layout dinâmico pela variável $layout através fo SolicitacaoController -->
@extends($layout)

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
                <!-- Título da lista de solicitações -->
                <h2>Lista de solicitações</h2>
                
                <!-- Tabela de solicitações -->
                <div class="user-table">
                    <table>
                        <!-- Cabeçalho da tabela -->
                        <thead>
                            <tr>
                                <th class="table-header">Código</th>
                                <th class="table-header">Solicitante</th>
                                <th class="table-header">Serviço</th>
                                <th class="table-header">Data de emissão da solicitação</th>
                                <th class="table-header">Descrição do pedido</th>
                                <th class="table-header">Data de entrega prevista</th>
                                <th class="table-header">Status do pedido</th>
                            </tr>
                        </thead>
                        <!-- Corpo da tabela com dados dinâmicos -->
                        <tbody>
                            <!-- Loop para exibir as ordens de serviço -->
                            @foreach($ordens as $ordem)
                                <!-- Condição para exibir apenas as ordens associadas ao usuário logado -->
                                @if($ordem->cd_matricula_funcionario == Session::get('codigoDoUsuario'))
                                    <tr>
                                        <td>{{ $ordem->cd_solicitacao }}</td>
                                        <td>{{ $ordem->cd_matricula_funcionario }}</td>
                                        <td>{{ $ordem->nm_servico_solicitado }}</td>
                                        <td>{{ date_format($ordem->dt_emissao_solicitacao, 'd/m/Y') }}</td>
                                        <td>{{ $ordem->ds_solicitacao }}</td>
                                        <td>
                                            <!-- Condição para exibir a data de entrega se houver uma ordem associada -->
                                            @if($ordem->ordem)
                                                {{ date_format($ordem->ordem->dt_entrega_ordem_servico, 'd/m/Y') }}
                                            @endif
                                        </td>
                                        <td>
                                            <!-- Condição para exibir o status da ordem se houver uma ordem associada -->
                                            @if($ordem->ordem)
                                                {{ $ordem->ordem->nm_status_ordem_servico }}
                                            @else
                                                <!-- Mensagem se não houver uma ordem associada -->
                                                <p>Sem ordem associada</p>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
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