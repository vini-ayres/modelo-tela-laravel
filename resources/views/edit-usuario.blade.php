@extends('dashboard.administrador')

@section('content')

<head>
    <title>Editando ordem </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lista.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <style>
    td a{
      color: black;
    }

    table {
        width: 80%;
        border-collapse: collapse;
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
    }

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

@if(session('msg'))
      <p class="msg">{{ session('msg')}}</p>
      @endif
    <div id="content">
        <h2>Editando: </h2>
        <!-- Formulário de Ordem de Serviço -->
        <form method="POST" action="{{ route('usuario.update',['id' => $usuario -> cd_matricula_funcionario]) }}">

            @csrf
            @method('PUT')

            <h2>Lista de ordens de serviço</h2>
            <div class="user-table">
                <table>

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
                        <td><select name="cd_nivel_acesso_funcionario" id="cd_nivel_acesso_funcionario">
                                    <option disabled selected value="{{$usuario->getNivelAcessoNome()}}" style="display: none;">{{$usuario->getNivelAcessoNome()}}</option>
                                        <option value="0">Funcionário</option>
                                        <option value="1">Técnico</option>
                                        <option value="2">Coordenador</option>
                                        <option value="3">Administrador</option>
                            </select> 
                        </td>
                    </tr>

                    <!--strtotime é usada para analisar datas em formato de texto -->
                    <tr>
                        <td>E-mail:</td>
                        <td><a href="mailto:{{ $usuario->nm_email_institucional_funcionario }}">{{ $usuario->nm_email_institucional_funcionario }}</a></td>
                        
                    </tr>
                    <tr>
                        <td>Cargo:</td>
                        <td>{{ $usuario->nm_cargo_funcionario }}</td>
                    </tr>
                </table>
                <br>
                <input id="botao_enviar" type="submit" value="Salvar alterações">
        </form><br>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</body>

<script>
    // Adicione aqui a lógica para a ação de logout
    document.getElementById('logout').addEventListener('click', function() {
        // Adicione a lógica de deslogar o usuário
        alert('Usuário deslogado!');
    });
</script>
@endsection