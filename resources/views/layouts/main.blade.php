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
            width: 235px;
            height: 100%;
            background-color: #389737;
            color: #fff;
            position: fixed;
            padding: 20px 10px 20px 20px;
        }

        #content {
            margin-left: 300px;
            padding: 20px;
        }

        #logout {
            color: black;
            cursor: pointer;
        }

        a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 0;
            border-bottom: 1px solid #555;
            transition: background-color 0.3s;
            width: 100%;
        }

        a:hover {
            background-color: #555;
        }

        a.selected {
            background-color: #4ab249;
            border-bottom: 1px solid #fff; /* Destaca a aba selecionada */
        }
    </style>
</head>
<body>

<div id="sidebar">
    <div id="user-info">
        <strong>Usuário Logado:</strong>
        <p>Nome do Usuário</p>
    </div>
    <a href="/form" onclick="changeTab(this)">Formulário de ordens de serviço</a>
    <a href="/lista" onclick="changeTab(this)">Lista de ordens de serviço</a>
    <a href="/status" onclick="changeTab(this)">Status das ordens de serviço</a>
    <a href="/gerenciamento" onclick="changeTab(this)">Gerenciamento de usuários</a>
    <br>
    <div id="logout">Logout</div>
</div>

@yield('content')

<script>
    // Obtém o caminho da URL da página atual
    var currentPath = window.location.pathname;

    // Remove a barra inicial, se existir, para facilitar a comparação
    currentPath = currentPath.replace(/^\//, '');

    // Função para marcar a aba correspondente à página atual como selecionada
    function markSelectedTab() {
        var links = document.querySelectorAll('#sidebar a');

        // Itera sobre os links e verifica se o caminho da URL corresponde ao href do link
        links.forEach(function(link) {
            var linkPath = link.getAttribute('href').replace(/^\//, '');

            if (currentPath === linkPath) {
                link.classList.add('selected');
            }
        });
    }

    // Adiciona a classe 'selected' à aba correspondente à página atual
    markSelectedTab();
</script>

</body>
</html>
