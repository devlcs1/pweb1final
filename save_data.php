<?php
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
/* Conectar ao banco de dados (substitua as informações conforme necessário)
$servername = "seu_servidor_mysql";
$username = "seu_usuario_mysql";
$password = "sua_senha_mysql";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}*/

// Obter dados do formulário
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Armazenar a senha de forma segura
$dob = $_POST['dob'];
$gender = $_POST['gender'];

// Inserir dados no banco de dados
$sql = "INSERT INTO user_data (username, password, dob, gender) VALUES ('$username', '$password', '$dob', '$gender')";
echo $sql;

$stmt = $conexao->prepare($sql);
$stmt->execute();

$conexao->close();
?>