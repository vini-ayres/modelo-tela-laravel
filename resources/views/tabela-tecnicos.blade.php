@extends('dashboard.coordenador')

@yield('links-sidebar')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lista.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <title>Tabela de Ordem de Serviço</title>
</head>
<body>

<!-- TABELA 2 -->
<div class="ordens">
      @if(session('msg'))
      <p class="msg">{{ session('msg')}}</p>
      @endif
    <body>
    <div class="ordens" style="max-height: calc(100vh - 60px); overflow-y: auto;">
      <div class="ordem-servico-container">
        </a>
        <h2>Lista de técnicos</h2>
        <div class="user-table">
          <table>
            <thead>
              <tr>
                <th class="table-header">Código do Técnico</th>
                <th class="table-header">Código de Matrícula do Funcionário</th>
                <th class="table-header">Nome do Técnico</th>
                <th class="table-header">Email Institucional do Técnico</th>
              </tr>
            </thead>

            @foreach($tecnicos as $tecnico)
            <tbody>
                <tr>
                    <td>{{ $tecnico->cd_responsavel }}</td>
                    <td>{{ $tecnico->cd_matricula_funcionario }}</td>
                    <td>{{ $tecnico->funcionario->nm_funcionario }}</td>
                    <td>{{ $tecnico->funcionario->nm_email_institucional_funcionario }}</td>
                </tr>
            </tbody>
            @endforeach
          </table>
        </div>
      </div>
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