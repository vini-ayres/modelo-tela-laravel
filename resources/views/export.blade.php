@extends('dashboard.coordenador')

@section('content')

    <title>Editando ordem {{ $ordem ->cd_solicitacao }}</title>
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

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }

        .msg{
            color: black;
        }
    </style>
</head>
<body>

@if(session('msg'))
      <p class="msg">{{ session('msg')}}</p>
      @endif
<div id="content">
<h2>Exportar Ordem {{ $ordem -> cd_solicitacao}}</h2>
    <!-- Formulário de Ordem de Serviço -->
    <form method="POST" action="{{ route('export', ['id' => $ordem->cd_solicitacao]) }}">
    @csrf <!-- Adicione o token CSRF para proteção contra ataques de falsificação de solicitações entre sites -->
    @method('POST')
        <table>
            <thead>
                <tr>
                    <th colspan="2">Ordem de Serviço</th>
                </tr>
            </thead>
            <tr>
                <td>Código:</td>
                <td>{{ $ordem -> cd_solicitacao }}</td>
            </tr>
            <tr>
                <td>Responsável</td>
                <td>
                <select name="responsavelOrdem" id="responsavelOrdem">
                    <option value="" disabled selected>Selecione uma opção</option>
                    @foreach($tecnicos as $tecnico)
                    <option value="{{ $tecnico->cd_tecnico }}" {{ $ordem->tecnico && $ordem->tecnico->cd_matricula_funcionario == $tecnico->cd_matricula_funcionario ? 'selected' : '' }}>
                        {{ $tecnico->cd_matricula_funcionario }}
                    </option>
                    @endforeach
                </select>
                </td>
            </tr>
            <tr>
                <td>Material utilizado:</td>
                <td><textarea name="ds_material_utilizado_ordem_servico" rows="4" cols="50" id="ds_material_utilizado_ordem_servico" maxlength="300" required></textarea></td>
            </tr>
        </table>
        <br>
        <input id="botao_enviar" type="submit" value="Exportar">
        </form><br>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
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
