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
                    <thead>
                        <tr>
                            <th colspan="2">Formulário de Ordem de Serviço</th>
                        </tr>
                    </thead>

                    <tr>
                        <td>Matrícula:</td>
                        <td><input type="text" name="cd_matricula_funcionario" id="cd_matricula_funcionario" value="{{ $usuario->cd_matricula_funcionario}}"></td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td><input type="text" name="nm_funcionario" id="nm_funcionario" value="{{ $usuario->nm_funcionario}}"></td>
                    </tr>
                    <tr>
                        <td>Nível de acesso:</td>
                        <td><select name="nivel_acesso" id="nivel_acesso">
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
                <input id="botao_enviar" type="submit" value="Editar">
        </form><br>
        <!-- @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif -->
    </div>
</body>


@endsection