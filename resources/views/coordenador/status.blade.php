@extends('dashboard.coordenador')

@section('content')

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Status da Ordem</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/gerenciamento.css') }}">
  <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .actions {
            text-align: center;
        }
        .destacar {
            transition: transform 0.5s;
        }
        .destacar:hover {
            transform: scale(1.1);
            background-color: #ffcccb;
        }
    </style>
</head>

<body>
<div id="content">
<!-- Tabela de Dados -->
    <h2>Dados da Ordem de Serviço</h2>
    <table id="tabela-dados">
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Tipo de Serviço</th>
                <th>Departamento</th>
                <th>Cargo</th>
                <th>Data do Pedido</th>
                <th>Descrição do Pedido</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="tabela-corpo">
            <!-- Dados da Ordem de Serviço serão exibidos aqui -->
        </tbody>
    </table>
    </div>
</body>
</html>
<script>
    function submitForm() {
        // Coletar dados do formulário
        var matricula = document.getElementById("matricula").value;
        var tipoServico = document.querySelector('input[name="tipo_servico"]:checked');
        var departamento = document.getElementById("departamento").value;
        var cargo = document.getElementById("cargo").value;
        var dataPedido = document.getElementById("data_pedido").value;
        var descricao = document.getElementById("descricao").value;
        // Validar se todos os campos estão preenchidos
        if (matricula === "" || !tipoServico || departamento === "" || cargo === "" || dataPedido === "" || descricao === "") {
            alert("Por favor, preencha todos os campos.");
            return false;
        }
        // Criar nova linha na tabela de dados
        var tabelaCorpo = document.getElementById("tabela-corpo");
        var novaLinha = tabelaCorpo.insertRow();
        // Adicionar células com os dados do formulário
        var celulaMatricula = novaLinha.insertCell(0);
        celulaMatricula.innerHTML = matricula;
        var celulaTipoServico = novaLinha.insertCell(1);
        celulaTipoServico.innerHTML = tipoServico.value;
        var celulaDepartamento = novaLinha.insertCell(2);
        celulaDepartamento.innerHTML = departamento;
        var celulaCargo = novaLinha.insertCell(3);
        celulaCargo.innerHTML = cargo;
        var celulaDataPedido = novaLinha.insertCell(4);
        celulaDataPedido.innerHTML = dataPedido;
        var celulaDescricao = novaLinha.insertCell(5);
        celulaDescricao.innerHTML = descricao;
        var celulaStatus = novaLinha.insertCell(6);
        celulaStatus.innerHTML = "Pendente"; // Definir status inicial
        var celulaAcoes = novaLinha.insertCell(7);
        celulaAcoes.innerHTML = '<button onclick="editarLinha(this)">Editar</button>'+'<button onclick="confirmarMudancaStatus(this)">Confirmar</button>';
        //var celulaAcoes = novaLinha.insertCell(8);
       // celulaAcoes.innerHTML = '<button onclick="confirmarMudancaStatus(this)">Confirmar</button>';
        // Adicionar classe para efeito de destaque
        novaLinha.classList.add("destacar");
        // Limpar campos do formulário
        document.getElementById("matricula").value = "";
        document.querySelector('input[name="tipo_servico"]:checked').checked = false;
        document.getElementById("departamento").value = "";
        document.getElementById("cargo").value = "";
        document.getElementById("data_pedido").value = "";
        document.getElementById("descricao").value = "";
        return false; // Evitar que o formulário seja enviado
    }
    function editarLinha(botaoEditar) {
        var linha = botaoEditar.parentNode.parentNode;
        // Preencher formulário com os dados da linha selecionada
        document.getElementById("matricula").value = linha.cells[0].innerHTML;
        var tipoServico = linha.cells[1].innerHTML;
        document.querySelector('input[name="tipo_servico"][value="' + tipoServico + '"]').checked = true;
        document.getElementById("departamento").value = linha.cells[2].innerHTML;
        document.getElementById("cargo").value = linha.cells[3].innerHTML;
        document.getElementById("data_pedido").value = linha.cells[4].innerHTML;
        document.getElementById("descricao").value = linha.cells[5].innerHTML;
        // Adicionar classe de destaque
        linha.classList.add("destacar");
        // Substituir a célula de status por radio buttons
        var celulaStatus = linha.cells[6];
        var statusAtual = celulaStatus.innerHTML;
        celulaStatus.innerHTML = '<label><input type="radio" name="novo_status" value="Em Processamento"> Em Processamento</label><br>' +
                                 '<label><input type="radio" name="novo_status" value="Concluída"> Concluída</label><br>' +
                                 '<label><input type="radio" name="novo_status" value="Esperando Atendimento"> Esperando Atendimento</label><br>' +
'<label><input type="radio" name="novo_status" value="Cancelada"> Cancelada</label>';
        // Marcar o radio button correspondente ao status atual
        celulaStatus.querySelector('input[name="novo_status"][value="' + statusAtual + '"]').checked = true;
        // Adicionar botão de confirmação
       // celulaStatus.innerHTML += '<button onclick="confirmarMudancaStatus(this)">Confirmar</button>';
        // Remover classe de destaque após a edição
        linha.classList.remove("destacar");
    }
    function confirmarMudancaStatus(botaoConfirmar) {
        var linha = botaoConfirmar.parentNode.parentNode;
        // Atualizar o status com base no radio button selecionado
        var novoStatus = linha.querySelector('input[name="novo_status"]:checked').value;
        linha.cells[6].innerHTML = novoStatus;
        // Remover opções de radio button e botão de confirmação
        var celulaStatus = linha.cells[6];
        celulaStatus.innerHTML = novoStatus;
        // Remover classe de destaque
        linha.classList.remove("destacar");
    }
    // Adicione aqui a lógica para a ação de logout
    document.getElementById('logout').addEventListener('click', function() {
        // Adicione a lógica de deslogar o usuário
        alert('Usuário deslogado!');
    });
</script>
@endsection('content')
