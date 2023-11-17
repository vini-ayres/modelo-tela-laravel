@extends('dashboard.coordenador')

@section('content')

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordem de Serviço</title>
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
            max-width: 300px;
            margin-left: auto;
            margin-right: auto;
        }

        .alert-success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
        }
    </style>
</head>
<body>
<div id="content">
<h2>Ordem de Serviço</h2>
    <!-- Formulário de Ordem de Serviço -->
    <form method="POST" action="{{ url('dashboard-administrador/form') }}" onsubmit="return submitForm();">
    @csrf <!-- Adicione o token CSRF para proteção contra ataques de falsificação de solicitações entre sites -->
        <table>
            <thead>
                <tr>
                    <th colspan="2">Formulário de Ordem de Serviço</th>
                </tr>
            </thead>
            <tr>
                <td>Matrícula:</td>
                <td><input type="text" name="cd_matricula_funcionario" id="cd_matricula_funcionario"></td>
            </tr>
            <tr>
                <td>Tipo de Serviço:</td>
                <td>
                    <label><input type="radio" name="nm_servico_solicitado" value="elétrico"> Elétrico</label><br>
                    <label><input type="radio" name="nm_servico_solicitado" value="hidráulico"> Hidráulico</label><br>
                    <label><input type="radio" name="nm_servico_solicitado" value="pintura"> Pintura</label><br>
                    <label><input type="radio" name="nm_servico_solicitado" value="telefonia"> Telefonia</label><br>
                    <label><input type="radio" name="nm_servico_solicitado" value="outro" id="tipo_outro_radio" onclick="mostrarOutro()"> Outro</label>
                    <input type="text" name="tipo_outro" id="tipo_outro_input" placeholder="Especifique outro serviço" style="display:none;">
                </td>
            </tr>
            <tr>
                <td>Data de Entrega do Pedido:</td>
                <td><input type="date" name="dt_entrega_solicitacao" id="dt_entrega_solicitacao" required></td>
            </tr>
            <tr>
                <td>Descrição do Pedido:</td>
                <td><textarea name="ds_solicitacao" rows="4" cols="50" id="ds_solicitacao" maxlength="300" required></textarea></td>
            </tr>
        </table>
        <br>
        <input id="botao_enviar" type="submit" value="Enviar">
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