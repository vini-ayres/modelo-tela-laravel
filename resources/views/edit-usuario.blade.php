@extends('dashboard.administrador')

@section('content')

<head>
    <!-- Definindo o título da página -->
    <title>Editando usuário</title>

    <!-- Adicionando estilos CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lista.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Estilos CSS embutidos -->
    <style>
        /* Estilizando links em células da tabela */
        td a {
            color: black;
        }

        /* Estilos para a tabela */
        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Estilos para o botão de envio do formulário */
        #botao_enviar {
            display: block;
            margin: 0 auto;
            padding: 10px 20px;
            font-size: 16px;
            font-family: 'Arial', sans-serif;
            color: #fff;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #botao_enviar:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <!-- Exibição de uma mensagem flash, se houver -->
    @if(session('msg'))
        <p class="msg">{{ session('msg')}}</p>
    @endif

    <!-- Conteúdo da página -->
    <div id="content">
        <!-- Título da página -->
        <h2>Editando: </h2>

        <!-- Formulário para atualizar usuário -->
        <form method="POST" action="{{ route('usuario.update',['id' => $usuario -> cd_matricula_funcionario]) }}">
            @csrf <!-- Token CSRF para proteção contra ataques CSRF -->
            @method('PUT') <!-- Método HTTP para simular um pedido PUT -->

            <!-- Título da lista de ordens de serviço -->
            <h2>Lista de ordens de serviço</h2>

            <!-- Tabela exibindo informações do usuário -->
            <div class="user-table">
                <table>
                    <!-- Detalhes do usuário em células da tabela -->
                    <tr>
                        <td>Matrícula:</td>
                        <td>{{ $usuario->cd_matricula_funcionario}}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{ $usuario->nm_funcionario}}</td>
                    </tr>
                    <tr>
                        <td>Nível de acesso:</td>
                        <td>
                            <!-- Dropdown para selecionar o nível de acesso do usuário -->
                            <select name="cd_nivel_acesso_funcionario" id="cd_nivel_acesso_funcionario">
                                <option disabled selected value="{{$usuario->getNivelAcessoNome()}}" style="display: none;">{{$usuario->getNivelAcessoNome()}}</option>
                                <option value="0">Funcionário</option>
                                <option value="1">Técnico</option>
                                <option value="2">Coordenador</option>
                                <option value="3">Administrador</option>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <td>E-mail:</td>
                        <td>
                            <!-- Link para enviar e-mail ao usuário -->
                            <a href="mailto:{{ $usuario->nm_email_institucional_funcionario }}">{{ $usuario->nm_email_institucional_funcionario }}</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Cargo:</td>
                        <td>{{ $usuario->nm_cargo_funcionario }}</td>
                    </tr>
                </table>
                <br>

                <!-- Botão para enviar o formulário de atualização -->
                <input id="botao_enviar" type="submit" value="Salvar alterações">
            </form><br>

            <!-- Exibição de mensagem de sucesso, se houver -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
    </body>

    <!-- Script JavaScript para ação de logout -->
    <script>
        document.getElementById('logout').addEventListener('click', function() {
            alert('Usuário deslogado!');
        });
    </script>
@endsection