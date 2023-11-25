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
<div class="ordens" style="max-height: calc(100vh - 80px); overflow-y: auto;">
  <div class="ordem-servico-container">
    </a>
    <h2>Lista de ordens de serviço</h2>
    <div class="user-table">
      <table>
        <thead>
          <tr>
            <th class="table-header">Serviço</th>
            <th class="table-header">Data do pedido</th>
            <th class="table-header">Descrição do pedido</th>
            <th class="table-header">Responsável</th>
            <th class="table-header">Data de fechamento</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Elétrica</td>
            <td>12/04/2023</td>
            <td>Substituição de dispositivos elétricos danificados.</td>
            <td>Vinicius</td>
            <td>
              <button class="edit-button-bold">Exportar</button>
              <button class="delete-button">Editar</button>
            </td>
          </tr>
          <tr>
            <td>Pintura</td>
            <td>20/05/2023</td>
            <td>Pintura das paredes da classe 241.</td>
            <td>Matheus</td>
            <td>
              <button class="edit-button-bold">Exportar</button>
              <button class="delete-button">Editar</button>
            </td>
          </tr>
        </tbody>
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