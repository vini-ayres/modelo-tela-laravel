@extends('layouts.main')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Ordem de Serviço</title>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>Data</th>
            <th>Status</th>
            <th>Responsável</th>
            <th>Data de Fechamento</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>01/08/2023</td>
            <td>Concluído</td>
            <td>João</td>
            <td>05/08/2023</td>
        </tr>
        <tr>
            <td>02/08/2023</td>
            <td>Em Processo</td>
            <td>Maria</td>
            <td>08/08/2023</td>
        </tr>
        <!-- Adicione mais linhas conforme necessário -->
    </tbody>
</table>

<label for="dateFilter">Filtrar por Data:</label>
<input type="date" id="dateFilter" onchange="filterTable()">

<label for="statusFilter">Filtrar por Status:</label>
<select id="statusFilter" onchange="filterTable()">
    <option value="">Todos</option>
    <option value="Não Iniciado">Não Iniciado</option>
    <option value="Em Processo">Em Processo</option>
    <option value="Cancelado">Cancelado</option>
    <option value="Concluído">Concluído</option>
</select>

<label for="responsavelFilter">Filtrar por Responsável:</label>
<select id="responsavelFilter" onchange="filterTable()">
    <option value="">Todos</option>
    <option value="João">João</option>
    <option value="Maria">Maria</option>
    <!-- Adicione mais opções conforme necessário -->
</select>

<script>
    function filterTable() {
        var dateFilter = document.getElementById('dateFilter').value;
        var statusFilter = document.getElementById('statusFilter').value;
        var responsavelFilter = document.getElementById('responsavelFilter').value;

        var table = document.querySelector('table');
        var rows = table.querySelectorAll('tbody tr');

        rows.forEach(function(row) {
            var date = row.querySelector('td:nth-child(1)').innerText;
            var status = row.querySelector('td:nth-child(2)').innerText;
            var responsavel = row.querySelector('td:nth-child(3)').innerText;

            var dateMatch = dateFilter === '' || date === dateFilter;
            var statusMatch = statusFilter === '' || status === statusFilter;
            var responsavelMatch = responsavelFilter === '' || responsavel === responsavelFilter;

            if (dateMatch && statusMatch && responsavelMatch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>

</body>
</html>


@endsection('content')