$(document).ready(function() {
    // Seleciona o botão de deletar
    var deleteButton = $("#delete-button");
  
    // Adiciona o evento click ao botão
    deleteButton.click(function() {
      // Mostra o balãozinho de confirmação
      swal({
        title: "Deseja excluir o registro?",
        text: "Esta ação não poderá ser desfeita.",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Sim, excluir",
        cancelButtonText: "Cancelar",
      }).then((result) => {
        // Se o usuário clicou em "Sim", envia o formulário
        if (result.value) {
          deleteButton.closest("form").submit();
        }
      });
    });
  });