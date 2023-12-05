<!DOCTYPE html>
<html>
<head>
    <title>Solicitação Enviada com Sucesso</title>
</head>
<body>
    <h1>Sua solicitação foi enviada com sucesso!</h1>
    
    <p>Detalhes da solicitação:</p>
    <ul>
        <li>Número da Solicitação: {{ $pedido->cd_solicitacao }}</li>
        <li>Serviço Solicitado: {{ $pedido->nm_servico_solicitado }}</li>
        <li>Descrição: {{ $pedido->ds_solicitacao }}</li>
        <li>Data de Emissão: {{ $pedido->dt_emissao_solicitacao }}</li>
    </ul>
</body>
</html>