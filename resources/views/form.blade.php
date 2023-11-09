@extends('layouts.main')

@section('content')

<div id="content">
  <!-- Conteúdo da página vai aqui -->
  <h1>Formulário de Ordem de Serviço</h1><br>

  <form action="processar_ordem_servico.php" method="post">
      <label for="tipo_servico">Tipo de Serviço:</label>
      <select id="tipo_servico" name="tipo_servico" required>
          <option value="manutencao">Manutenção</option>
          <option value="instalacao">Instalação</option>
          <option value="suporte">Suporte</option>
      </select>
  
      <label for="descricao">Descrição do Serviço:</label>
      <textarea id="descricao" name="descricao" rows="4" required></textarea>
  
      <button type="submit">Enviar Ordem de Serviço</button>
  </form>
</div>

@endsection('content')