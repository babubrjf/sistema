<?php
session_start();
include 'config.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

//define o nome da sessão pelo id do professor
$id = $_SESSION['id'];
$nome =  $_SESSION['nome'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo = "prof";
    $professor_nome = $_SESSION['nome'];

    $sql = "INSERT INTO Professores (nome, email, senha, tipo) VALUES ('$nome', '$email', '$senha', '$tipo')";
    
    if ($conn->query($sql) === TRUE) {
        echo"<script>alert('PROFESSOR(A) CADASTRADO(A) COM SUCESSO!');history.go(-2);</script>";
    } else {
        echo "Erro ao cadastrar professor: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Professor</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #2B4570;
        }
    </style>
</head>
<body style="background-color: #1C2E4A">
    <nav class="navbar navbar-custom">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-white" role="button" onclick="window.location.href= 'listar_professores.php'">Bem-vindo(a), <?php echo $nome; ?></span>                                                
            <a href="logout.php" class="btn btn-danger">Sair</a>
        </div>
    </nav>
    <div class="container mt-5">
        <h4 style="color:white">Cadastrar Professor: </h4>
        <form method="post" action="cadastrar_professor.php">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" class="form-control" placeholder="Nome Completo" required>
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                <label for="senha" class="form-label">Senha:</label>
                <input type="text" name="senha" class="form-control" placeholder="Senha" required>
            </div>
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
        
    </div>
</body>
</html>