<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <style>
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

        #sidebar {
            position: fixed;
            left: 0;
        }

        #logo {
            margin-bottom: 20px;
        }

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

<div id="logo">
    <img src="{{ asset('imagens/logoifsp2.png') }}" alt="Logo" width="250">
</div>

<div id="login-container">
    <h2>CRIE SUA SENHA</h2>
    <br>
    <form action="{{ route('definir-senha') }}" method="post">
        @csrf

        <label for="cd_matricula_funcionario">Número de Matrícula:</label>
        <input type="text" name="cd_matricula_funcionario" required>

        <label for="ds_senha_funcionario"> Crie uma senha:</label>
        <input type="password" name="ds_senha_funcionario" required>

        <button type="submit">Criar senha</button>
    </form>
</div>

</body>
</html>
