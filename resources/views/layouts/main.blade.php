<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagens/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div id="navbar">
    </div>
    <title>Painel de Ordem de Serviço</title>
<div id="sidebar">
    <div id="user-info">
        <strong>Usuário Logado:</strong>
        <p>{{ Session::get('nomeDoUsuario') }}</p>
    </div>
    @yield('links-sidebar')
    <br>
    <div id="logout"><a href="/login">Logout</a></div>
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
