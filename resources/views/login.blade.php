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
    <img src="data:image/png;base64,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" alt="Logo" width="200">
</div>

<div id="login-container">
    <h2>TELA DE LOGIN</h2>
    <br>
    <form action="processar_login.php" method="post">
        <label for="matricula">Número de matrícula</label>
        <input type="text" id="matricula" name="matricula" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit">Entrar</button>
        <a href="/login">Proximo</a>
    </form>
</div>

</body>
</html>
