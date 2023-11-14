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
    <h2>FAÇA SEU LOGIN</h2>
    <br>
    <form action="processar_login.php" method="post">
        <label for="matricula">Número de matrícula</label>
        <input type="text" id="matricula" name="matricula" required>

        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit">Entrar</button>
        <a href="/login">Proximo</a>
    </form>
</div>

</body>
</html>
