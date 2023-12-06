<?php
session_start();
$user = null;
$pass = null;

if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
}

if ($user == 'lucas' && $pass == '123') {
    $_SESSION['logado'] = true;
    header('Location: lista.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Registro</title>
    <style>
        /* Adicione o conteúdo do style.css aqui */

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .container {
            width: 400px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            margin-bottom: 8px;
            color: #555;
        }

        input {
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #2980b9;
        }

        /* Responsividade */
        @media screen and (max-width: 450px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <form id="registerForm" action="login.php" method="post">
            <h2>Login</h2>

            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>

        <script>
        // Adicione o conteúdo do script.js aqui
   /* function validateRegistration() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirmPassword').value;
        var dob = document.getElementById('dob').value;
        var gender = document.getElementById('gender').value;

        // Adicione suas verificações de credenciais aqui
        // Este é um exemplo simples, você deve implementar a autenticação de forma segura no lado do servidor.

        if (password !== confirmPassword) {
            alert('As senhas não coincidem. Tente novamente.');
        } else {
            // Enviar dados para o servidor PHP
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'save_data.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert(xhr.responseText);
                }
            };
            xhr.send('username=' + username + '&password=' + password + '&dob=' + dob + '&gender=' + gender);
        }
    }*/
        </script>


</body>
</html>