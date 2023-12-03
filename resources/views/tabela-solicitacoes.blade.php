@extends($layout)

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
        <h2>Lista de solicitações</h2>
        <div class="user-table">
        <table>
            <thead>
              <tr>
                <th class="table-header">Código</th>
                <th class="table-header">Solicitante</th>
                <th class="table-header">Serviço</th>
                <th class="table-header">Data de emissão da solicitação</th>
                <th class="table-header">Descrição do pedido</th>
                <th class="table-header">Data de entrega prevista</th>
              </tr>
            </thead>
            <tbody>
            @foreach($ordens as $ordem)
                @if($ordem->cd_matricula_funcionario == Session::get('codigoDoUsuario'))
                    <tr>
                        <td>{{ $ordem->cd_solicitacao }}</td>
                        <td>{{ $ordem->cd_matricula_funcionario }}</td>
                        <td>{{ $ordem->nm_servico_solicitado }}</td>
                        <td>{{ date_format($ordem->dt_emissao_solicitacao, 'd/m/Y') }}</td>
                        <td>{{ $ordem->ds_solicitacao }}</td>
                        <td>
                            @if($ordem->ordem)
                                {{ date_format($ordem->ordem->dt_entrega_ordem_servico, 'd/m/Y') }}
                            @endif
                        </td>
                    </tr>
                @else
                  <tr>
                    <td colspan=6>Nenhuma solicitação encontrada por este usuário</td>
                  </tr>
                @endif
            @endforeach
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