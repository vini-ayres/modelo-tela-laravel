@extends('layouts.main')

@section('content')

<div id="content">
    <!-- Conteúdo da página vai aqui -->
    <h1>Bem-vindo ao Painel de Ordem de Serviço</h1><br>

    <h3>Tabela Técnicos</h3>
    <table>
        <tr>
            <th>ID </th>
            <th>Nome</th>
            <th>Email</th>
        </tr>
    </table><br>

    <h3>Tabela Solicitantes</h3>
    <table>
        <tr>
            <th>ID </th>
            <th>Nome</th>
            <th>Email</th>
        </tr>
    </table>
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