<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .login-container {
            width: 300px;
            margin: 100px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .logo-container {
            text-align: center;
        }

        .logo-container img {
            width: 100px; /* Ajuste a largura conforme necessário */
            height: auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #ea5900;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .login-button {
            background-color: #ea5900;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #e83654;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="logo-container">
        <img src="img/logo.png" alt="Logo">
    </div>
    <form action="processar_login.php" method="post">
        <div class="form-group">
            <label for="username" class="laranja-forte">Usuário:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password" class="laranja-forte">Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <a href="admin.php" class="login-button">Entrar</a>
    </form>
</div>

</body>
</html>
