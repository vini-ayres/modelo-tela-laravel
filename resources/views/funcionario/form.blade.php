@extends('dashboard.funcionario')

@section('content')

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordem de Serviço</title>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .actions {
            text-align: center;
        }

        .destacar {
            transition: transform 0.5s;
        }

        .destacar:hover {
            transform: scale(1.1);
            background-color: #ffcccb;
        }
    </style>
</head>
<body>
<div id="content">
<h2>Ordem de Serviço</h2>
    <!-- Formulário de Ordem de Serviço -->
    <form onsubmit="return submitForm();">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Formulário de Ordem de Serviço</th>
                </tr>
            </thead>
            <tr>
                <td>Matrícula:</td>
                <td><input type="text" name="matricula" id="matricula"></td>
            </tr>
            <tr>
                <td>Tipo de Serviço:</td>
                <td>
                    <label><input type="radio" name="tipo_servico" value="elétrico"> Elétrico</label><br>
                    <label><input type="radio" name="tipo_servico" value="hidráulico"> Hidráulico</label><br>
                    <label><input type="radio" name="tipo_servico" value="pintura"> Pintura</label>
                </td>
            </tr>
            <tr>
                <td>Departamento:</td>
                <td><input type="text" name="departamento" id="departamento"></td>
            </tr>
            <tr>
                <td>Cargo:</td>
                <td><input type="text" name="cargo" id="cargo"></td>
            </tr>
            <tr>
                <td>Data do Pedido:</td>
                <td><input type="date" name="data_pedido" id="data_pedido" required></td>
            </tr>
            <tr>
                <td>Descrição do Pedido:</td>
                <td><textarea name="descricao" rows="4" cols="50" id="descricao" maxlength="300"></textarea></td>
            </tr>
        </table>
        <br>
        <input type="submit" value="Enviar">
    </form>
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