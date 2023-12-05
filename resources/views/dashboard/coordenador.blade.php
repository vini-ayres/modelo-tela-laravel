@extends('layouts.main')

@section('links-sidebar')
    <a href="/dashboard-coordenador/form" onclick="changeTab(this)">Formulário de ordens de serviço</a>
    <a href="/dashboard-coordenador/minhas-solicitacoes" onclick="changeTab(this)">Minhas solicitações</a>
    <a href="/dashboard-coordenador/lista" onclick="changeTab(this)">Lista de ordens de serviço</a>
    <a href="/dashboard-coordenador/tecnicos" onclick="changeTab(this)">Lista de técnicos</a>
@endsection('links-sidebar')

@section('content')
<head>
<title>Home</title>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    #content {
        text-align: center;
        padding: 20px;
    }

    .welcome-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .welcome-text {
        text-align: center;
        margin-bottom: 10px;
        margin-left: 10px;
        margin-right: 10px;
    }

    .image-container {
        margin-top: -75px; /* Ajuste conforme necessário */
    }

    .image-container img {
        max-width: 70%; /* Ajuste a largura máxima para ocupar a largura total do contêiner */
        height: auto;
    }

    h1 {
        margin-bottom: 0;
    }

    p {
        margin-bottom: 20px;
        margin-left: 10px;
        margin-right: 10px;
    }

    @media screen and (max-width: 600px) {
        .image-container img {
        max-width: 100%;
        }

        .image-container {
            margin-top: -15px; /* Ajuste conforme necessário */
        }

        .welcome-text,
        p {
            margin-left: 5px;
            margin-right: 5px;
        }
    }
</style>
</head>

<body>
    <div id="content">
        <div class="welcome-container">
            <h1>Bem-vindo ao Sistema de Ordens de Serviço</h1>
            <div class="welcome-text">
                <p>Seja bem-vindo ao nosso Sistema de Ordens de Serviço, projetado para tornar o processo de requisição e acompanhamento de serviços mais simples e eficientes. Estamos comprometidos em proporcionar uma experiência fácil e transparente para atender às suas necessidades.</p>
            </div>
            <div class="image-container">
                <img src="{{ asset('imagens/WELCOME.png') }}" alt="Imagem de boas-vindas">
            </div>
        </div>
    </div>

<script>
    // Adicione aqui a lógica para a ação de logout
    document.getElementById('logout').addEventListener('click', function() {
        // Adicione a lógica de deslogar o usuário
        alert('Usuário deslogado!');
    });
</script>

{{-- Este é o comentário do Blade --}}
@endsection('content')