@extends('dashboard.administrador')

@section('links-sidebar')
<a href="/dashboard-administrador/form" onclick="changeTab(this)">Formulário de ordens de serviço</a>
<a href="/dashboard-administrador/gerenciamento" onclick="changeTab(this)">Gerenciamento de usuários</a>
@endsection('links-sidebar')

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
  <style>
 /* Estilos para o modal */
 #confirmation-modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #fff;
    border: 2px solid #007BFF;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px; /* Ajuste conforme necessário */
}

p {
    margin-bottom: 20px;
}

button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#confirm-button {
    background-color: #4CAF50;
    color: white;
}

#cancel-button {
    background-color: #6C757D;
    color: white;
}
  </style>
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
            <th class="table-header">Cargo</th>
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
            <td>


            <form action="administrador/usuario/delete/{{ $usuario->cd_matricula_funcionario}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="delete-button" data-user-id="{{ $usuario->cd_matricula_funcionario }}">Deletar</button>
            </form>
        </td>
    </tr>
@endforeach

<!-- Modal de confirmação -->
<div class="modal" id="confirmation-modal">
    <div class="modal-content">
        <p>Tem certeza de que deseja excluir este usuário?</p>
        <button id="confirm-button">Sim</button>
        <button id="cancel-button">Não</button>
    </div>
</div>
<script>
   const deleteButtons = document.querySelectorAll(".delete-button");
    const modal = document.getElementById("confirmation-modal");
    const confirmButton = document.getElementById("confirm-button");
    const cancelButton = document.getElementById("cancel-button");

    deleteButtons.forEach(function (button) {
        button.addEventListener("click", function (event) {
            // Mostra o modal quando um botão de exclusão é clicado
            modal.style.display = "flex";

            confirmButton.onclick = function () {
                // Confirmando - enviar formulário
                button.closest("form").submit();
                modal.style.display = "none";
            };

            cancelButton.onclick = function () {
                // Cancelando - fechar o modal
                modal.style.display = "none";
            };

            event.preventDefault();
        });
    });
</script>
              <!--<form action="administrador/usuario/delete/{{ $usuario -> cd_matricula_funcionario}}" method="POST">
                @csrf
                @method('DELETE')
                <form action="administrador/usuario/delete/{{ $usuario -> cd_matricula_funcionario}}" method="POST">
                <button class="delete-button" id="delete-button">Deletar</button>
        
              </form>
          </td>
          </tr>
          
          <script>

// Atribui um evento click a todos os botões com a classe "delete-button"
const deleteButtons = document.querySelectorAll(".delete-button");

deleteButtons.forEach(function (button) {
    button.addEventListener("click", function (event) {
        // Exibe um alerta para cada botão clicado
        var confirmation = confirm("Tem certeza de que deseja excluir este usuário?");

        // Se confirmado, a ação padrão continua (enviar formulário)
        // Se cancelado, a ação padrão é cancelada
        if (!confirmation) {
            event.preventDefault();
        }
    });
});
</script>-->
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