<?php

$nome = null;
$sobrenome = null;
$nascimento = null;
$email = null;

var_dump($_POST);

if (isset($_POST['submit'])) {

    $nome       = $_POST['nome'];
    $sobrenome  = $_POST['sobrenome'];
    $nascimento = $_POST['nascimento'];
    $email      = $_POST['email'];

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
    
    $sql = "INSERT INTO cliente_data (nome,sobrenome,data_nascimento,email) VALUES ('$nome','$sobrenome','$nascimento','$email')";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    header('Location: lista.php');

}