<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Define o ícone da página -->
    <link rel="shortcut icon" href="{{ asset('imagens/favicon.ico') }}" type="image/x-icon"/>
    <!-- Inclui o estilo CSS da aplicação -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<!-- Início da div que representa a barra de navegação -->
<div id="navbar">
    <!-- Conteúdo da barra de navegação pode ser adicionado aqui -->
</div>

<!-- Início da div que representa a barra lateral -->
<div id="sidebar">
    <!-- Início da div que exibe informações do usuário -->
    <div id="user-info">
        <!-- Logo da página inicial -->
        <img id="home-logo" src="{{ asset('imagens/ifsp-logo-branco.png') }}" alt="IFSP Câmpus Cubatão" width="50">
        <br><br>
        <!-- Exibe informações do usuário logado -->
        <strong>Usuário Logado:</strong>
        <p style="margin-left: 0px;">{{ Session::get('nomeDoUsuario') }}</p>
        <p style="margin-left: 0px;">{{ Session::get('codigoDoUsuario') }}</p>
    </div>
    <!-- Inclui o conteúdo da barra lateral definido nas views filhas -->
    @yield('links-sidebar')
    <br>
    <!-- Link para realizar logout -->
    <div id="logout"><a href="/login">Logout</a></div>
</div>
<!-- Fim da div da barra lateral -->

<!-- Inclui o conteúdo específico da view filha -->
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