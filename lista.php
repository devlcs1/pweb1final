<?php
    session_start();
    if ($_SESSION['logado'] != true) {
        header('Location: login.php');
    }

    $host = 'localhost';
    $db_name = 'users';
    $username = 'root';
    $password = '';
    $charset = 'utf8';

    $dsn = "mysql:host={$host};port=3306;dbname={$db_name};charset={$charset}";

    try {
        $conexao = new PDO($dsn, $username, $password);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Erro na conexão: ' . $e->getMessage();
    }

    if (isset($_GET["termo"])){
        $termo = $_GET["termo"];
        $sql = "select * from cliente_data where nome like \"%$termo%\"";
    }else {
        $sql = "select * from cliente_data";
    }
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Registro</title>
    <style>

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

        a,button {
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        a,button:hover {
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

    <div class="container" style="width: 400px">

        

        <form id="registerForm" action="cliente.php" method="post">
            <h2>Cadastrar Cliente</h2>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="sobrenome">Sobrenome:</label>
            <input type="text" id="sobrenome" name="sobrenome" required>

            <label for="nascimento">Data de Nascimento:</label>
            <input type="date" id="nascimento" name="nascimento" required>

            <label for="email">email:</label>
            <input type="text" id="email" name="email" required>

            <button type="submit" name="submit" value="1">Registrar</button>
        </form>
    </div>
    <div class="container" style="margin-left: 2em">
    <form method="GET" action="lista.php">
        <label for="campo">Buscar</label>

        <input type="text" name="termo" id="termo" placeholder="Informe o nome do cliente solicitado.">

        <button type="submit">Buscar</button>
    </form>
        <table>
            <tr>
                <td>Codigo</td>
                <td>Nome</td>
                <td>Sobrenome</td>
                <td>Nascimento</td>
                <td>Email</td>
            </tr>

            
            <?php

                foreach($resultados as $resultado) {
                    echo "<tr>";
                    echo "    <td>".$resultado['codigo']."</td>";
                    echo "    <td>".$resultado['nome']."</td>";
                    echo "    <td>".$resultado['sobrenome']."</td>";
                    echo "    <td>".$resultado['data_nascimento']."</td>";
                    echo "    <td>".$resultado['email']."</td>";
                    echo "</tr>";
                }

            ?>

        </table>
        <br/>
        <a href="clear.php">Sair</a>
    </div>

        <script>
        
        </script>


</body>
</html>