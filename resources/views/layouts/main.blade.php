<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Ordem de Serviço</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        #sidebar {
            width: 250px;
            height: 100%;
            background-color: #333;
            color: #fff;
            position: fixed;
            padding: 20px 10px 20px 20px;
        }

        #content {
            margin-left: 300px;
            padding: 20px;
        }

        #logout {
            color: red;
            cursor: pointer;
        }

        a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 0;
        }

        a:hover {
            background-color: #555;
        }

        a:selected {
            color: #555;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<div id="sidebar">
    <div id="user-info">
        <strong>Usuário Logado:</strong>
        <p>Nome do Usuário</p>
    </div>
    <a href="/form">Formulário de Pedido</a>
    <a href="#">Gerenciamento de Ordens</a>
    <a href="#">Gerenciamento de Solicitantes e Técnicos</a>
    <div id="logout">Logout</div>
</div>

@yield('content')

</body>
</html>
