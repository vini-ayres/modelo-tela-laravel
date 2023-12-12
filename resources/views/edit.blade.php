@extends('dashboard.coordenador')

@section('content')
<head>
    <title>Editando ordem {{ $ordem ->cd_solicitacao }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lista.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
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

    /* Estilos para mensagens de alerta */
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

    /* Estilo para a mensagem de texto */
    .msg {
        color: black;
    }
    </style>
</head>
<body>
<!-- Exibição de uma mensagem flash, se houver -->
@if(session('msg'))
    <p class="msg">{{ session('msg')}}</p>
@endif
<div id="content">
    <h2>Editando: Ordem {{ $ordem -> cd_solicitacao}}</h2>

    <!-- Formulário de edição da Ordem de Serviço -->
    <form method="POST" action="{{ route('ordem.update', ['id' => $ordem->cd_solicitacao]) }}">
        @csrf <!-- Token CSRF para proteção contra ataques CSRF -->
        @method('PUT') <!-- Método HTTP para simular um pedido PUT -->

        <!-- Tabela para exibir detalhes da Ordem de Serviço -->
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
                <td>Solicitante:</td>
                <td>{{ $ordem -> cd_matricula_funcionario }}</td>
            </tr>
            <tr>
                <td>Tipo de Serviço:</td>
                <td>
                    <label>{{ $ordem -> nm_servico_solicitado }}</label>
                </td>
            </tr>
            <tr>
                <td>Descrição do pedido:</td>
                <td><textarea name="ds_solicitacao" rows="4" cols="50" id="dt_solicitacao" maxlength="300" required>{{ $ordem->ds_solicitacao }}</textarea></td>
            </tr>
        </table>
        <br>

        <!-- Botão para enviar o formulário de edição -->
        <input id="botao_enviar" type="submit" value="Editar">
    </form><br>

    <!-- Exibição de mensagem de sucesso, se houver -->
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

    function mostrarOutro() {
    var tipoOutroInput = document.getElementById('tipo_outro_input');

    if (document.querySelector('input[name="nm_servico_solicitado"]:checked').value === 'outro') {
        tipoOutroInput.style.display = 'block';
    } else {
        tipoOutroInput.style.display = 'none';
    }
}
</script>
@endsection('content')
