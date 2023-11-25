@extends('dashboard.administrador')

@yield('links-sidebar')

@section('content')

<head>
  <style>
    td a {
      color: black;
    }
  </style>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/gerenciamento.css') }}">
  <title>User List</title>
  <script src="public/js/gerenciamento.js"></script>
</head>

<body>

@if(session('msg'))
      <p class="msg">{{ session('msg')}}</p>
      @endif
  <div class="user-list-container">
    </a>
    <h2>Gerenciamento de usuários</h2>
    <div class="user-table">
      <table>
        <thead>
          <tr>
            <th class="table-header">Matricula</th>
            <th class="table-header">Nome</th>
            <th class="table-header">Email</th>
            <th class="table-header">nm_cargo_funcionario</th>
            <th class="table-header">Nível acesso</th>
            <th class="table-header">Ações</th>
          </tr>
        </thead>
        <tbody>

          @foreach($usuarios as $usuario)
          <tr>
            <td>
              <p>CB{{$usuario -> cd_matricula_funcionario}}</p>
            </td>
            <td>
              <p>{{$usuario -> nm_funcionario}}</p>
            </td>
            <td>
              <p><a href="mailto:{{$usuario -> nm_email_institucional_funcionario}}">{{$usuario -> nm_email_institucional_funcionario}}</a></p>
            </td>
            <td>
              <p>{{$usuario -> nm_cargo_funcionario}}</p>
            </td>
            <td>
              <p>{{$usuario -> getNivelAcessoNome()}}</p>
            </td>
            <td>

              <form action="administrador/edit-usuario/{{ $usuario -> cd_matricula_funcionario}}" method="GET">
                <button class="edit-button-bold">Editar</button>
              </form>

              <form action="administrador/usuario/delete/{{ $usuario -> cd_matricula_funcionario}}" method="POST">
                @csrf 
                @method('DELETE')
                <button class="delete-button" id="delete-button">Deletar</button>
              </form>
              
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal de Edição 
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
  </script>-->
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