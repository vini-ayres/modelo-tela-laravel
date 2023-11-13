@extends('layouts.main')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/gerenciamento.css') }}">
  <title>User List</title>
</head>

<body>
  <div class="user-list-container">
    </a>
    <h2>Gerenciamento de usuários</h2>
    <div class="user-table">
      <table>
        <thead>
          <tr>
            <th class="table-header">cd_matricula_funcionario</th>
            <th class="table-header">nm_funcionario</th>
            <th class="table-header">nm_cargo_funcionario</th>
            <th class="table-header">nm_departamento_funcionario</th>
            <th class="table-header">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>CB3032173</td>
            <td>Nelson</td>
            <td>Professor</td>
            <td>Tecnologia</td>
            <td>
              <button class="edit-button-bold">Editar</button>
              <button class="delete-button">Excluir</button>
            </td>
          </tr>
          <tr>
            <td>CB3094563</td>
            <td>João Carlos</td>
            <td>Técnico</td>
            <td>Manutenção</td>
            <td>
              <button class="edit-button-bold">Editar</button>
              <button class="delete-button">Excluir</button>
            </td>
          </tr>        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal de Edição -->
  <div class="modal-container">
    <div class="modal">
      <span class="close">&times;</span>
      <h2>Editar Usuário</h2>
      <div class="user-details">
        <label for="editName">Nome:</label>
        <input type="text" id="editName">
        <label for="editEmail">Email:</label>
        <input type="email" id="editEmail">
      </div>
      <button class="edit-button-bold">Salvar</button>
    </div>
  </div>

  <script>
    // Adicione seu código JavaScript aqui, se necessário
  </script>
</body>

</html>

@endsection('content')