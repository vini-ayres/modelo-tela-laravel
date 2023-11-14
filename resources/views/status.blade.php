@extends('dashboard.funcionario')

@yield('links-sidebar')
@section('content')
<script>
    // Adicione aqui a lógica para a ação de logout
    document.getElementById('logout').addEventListener('click', function() {
        // Adicione a lógica de deslogar o usuário
        alert('Usuário deslogado!');
    });
</script>
@endsection('content')
