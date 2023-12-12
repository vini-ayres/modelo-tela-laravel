<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Definindo a codificação de caracteres e a escala inicial para dispositivos -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Adicionando um ícone à guia do navegador -->
    <link rel="shortcut icon" href="{{ asset('imagens/favicon.ico') }}" type="image/x-icon"/>

    <!-- Definindo o título da página -->
    <title>Tela de Login</title>

    <!-- Estilos CSS embutidos -->
    <style>
        /* Estilos para o corpo da página */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        /* Estilos para a barra lateral (que não está presente no código) */
        #sidebar {
            position: fixed;
            left: 0;
        }

        /* Estilos para o logotipo (imagem de logo) */
        #logo {
            margin-bottom: 20px;
        }

        /* Estilos para o contêiner de login */
        #login-container {
            width: 300px;
            background-color: #333;
            color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            margin: auto; /* Adicionado para centralizar horizontalmente */
            margin-top: 50px; /* Ajuste para a margem superior */
        }

        h2 {
            margin-bottom: 8px;
        }

        /* Estilos para rótulos e campos de entrada no formulário */
        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        /* Estilos para o botão de envio do formulário */
        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<!-- Div para o logotipo -->
<div id="logo">
    <img src="{{ asset('imagens/logoifsp2.png') }}" alt="Logo" width="250">
</div>

<!-- Div para o contêiner de login -->
<div id="login-container">
    <h2>CRIE SUA SENHA</h2>
    <br>
    
    <!-- Formulário para definir a senha -->
    <form action="{{ route('definir-senha') }}" method="post">
        @csrf <!-- Token CSRF para proteção contra ataques CSRF -->

        <!-- Campo para inserir o número de matrícula -->
        <label for="cd_matricula_funcionario">Número de Matrícula:</label>
        <input type="text" name="cd_matricula_funcionario" required>

        <!-- Campo para criar uma senha -->
        <label for="ds_senha_funcionario">Crie uma senha:</label>
        <input type="password" name="ds_senha_funcionario" required>

        <!-- Botão de envio do formulário -->
        <button type="submit">Criar senha</button>
    </form>
</div>

</body>
</html>