@extends('layouts.main')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/lista.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <title>Tabela de Ordem de Serviço</title>
    <style>
        .filtros {
            position: absolute;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            width: 98%; 
            margin-top: 50px;
        }
        
        .filtros > * {
            margin-right: 10px;
        }

        .ordens {
            position: absolute;
            margin-top: 120px;
            left: 360px;
        }

        .ordens table tbody tr td {
            padding-bottom: 10px; /* Espaçamento adicional nas células */
        }
    </style>
</head>
<body>

<!-- TABELA 1: FILTROS -->
<div class="filtros">
<label>Data de Abertura:</label>
<input type="text" id="dateRangePickerAbertura"/>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<label>Status:</label>
<select id="statusFilter">
    <option value="Não Iniciado">Não Iniciado</option>
    <option value="Em Processo">Em Processo</option>
    <option value="Cancelado">Cancelado</option>
    <option value="Concluído">Concluído</option>
</select>

<label>Responsável:</label>
<select id="responsavelFilter">
    <option value="João">João</option>
    <option value="Maria">Maria</option>
    <option value="Carlos">Carlos</option>
    <option value="Isabel">Isabel</option>
    <option value="Ricardo">Ricardo</option>
    <option value="Fernanda">Fernanda</option>
    <option value="Pedro">Pedro</option>
    <option value="Mariana">Mariana</option>
    <option value="Gabriel">Gabriel</option>
    <option value="Laura">Laura</option>
    <option value="André">André</option>
    <option value="Susana">Susana</option>
</select>

<label>Data de Fechamento:</label>
<input type="text" id="dateRangePickerFechamento"/>
</div>

<script>
    $(document).ready(function () {
        // Inicializa o date range picker para a data de abertura
        $('#dateRangePickerAbertura').daterangepicker({
            opens: 'left',
            locale: {
                format: 'DD/MM/YYYY',
                applyLabel: 'Aplicar',
                cancelLabel: 'Cancelar',
                fromLabel: 'De',
                toLabel: 'Para',
                customRangeLabel: 'Intervalo Personalizado',
                daysOfWeek: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
                monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                firstDay: 1
            }
        });

        // Adiciona um evento quando o intervalo de datas de abertura é alterado
        $('#dateRangePickerAbertura').on('apply.daterangepicker', function (ev, picker) {
            var startDate = picker.startDate.format('DD/MM/YYYY');
            var endDate = picker.endDate.format('DD/MM/YYYY');
            
            console.log('Data de abertura - Início:', startDate);
            console.log('Data de abertura - Término:', endDate);
            
            // Adicione aqui a lógica para filtrar os dados com as datas de abertura selecionadas
        });

        // Inicializa o date range picker para a data de fechamento
        $('#dateRangePickerFechamento').daterangepicker({
            opens: 'left',
            locale: {
                format: 'DD/MM/YYYY',
                applyLabel: 'Aplicar',
                cancelLabel: 'Cancelar',
                fromLabel: 'De',
                toLabel: 'Para',
                customRangeLabel: 'Intervalo Personalizado',
                daysOfWeek: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
                monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                firstDay: 1
            }
        });

        // Adiciona um evento quando o intervalo de datas de fechamento é alterado
        $('#dateRangePickerFechamento').on('apply.daterangepicker', function (ev, picker) {
            var startDate = picker.startDate.format('DD/MM/YYYY');
            var endDate = picker.endDate.format('DD/MM/YYYY');
            
            console.log('Data de fechamento - Início:', startDate);
            console.log('Data de fechamento - Término:', endDate);
            
            // Adicione aqui a lógica para filtrar os dados com as datas de fechamento selecionadas
        });
    });
</script>

<!-- TABELA 2 -->
<div class="ordens">
<table border="1">
        <thead>
            <tr>
                <th>Serviço</th>
                <th>Data do Pedido</th>
                <th>Descrição do Pedido</th>
                <th>Responsável</th>
                <th>Data de Fechamento</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aqui você adicionará as linhas da tabela com os dados reais -->
            <tr>
                <td>Serviço 1</td>
                <td>01/01/2023</td>
                <td>Descrição do Serviço 1</td>
                <td>Responsável 1</td>
                <td>02/01/2023</td>
                <td>Concluído</td>
                <td>
                    <button class="export-btn" onclick="exportData()">Exportar</button>
                    <button class="edit-btn" onclick="editData()">Editar</button>
                </td>
            </tr>
            <tr>
                <td>Serviço 2</td>
                <td>05/01/2023</td>
                <td>Descrição do Serviço 2</td>
                <td>Responsável 2</td>
                <td>10/01/2023</td>
                <td>Em andamento</td>
                <td>
                    <button class="export-btn" onclick="exportData()">Exportar</button>
                    <button class="edit-btn" onclick="editData()">Editar</button>
                </td>
            </tr>
            <!-- Adicione mais linhas conforme necessário -->
        </tbody>
    </table>
</div>

    <script>
        function exportData() {
            // Lógica para exportar os dados
            alert("Dados exportados!");
        }

        function editData() {
            // Lógica para editar os dados
            alert("Editar dados");
        }
    </script>

</body>
</html>

@endsection('content')