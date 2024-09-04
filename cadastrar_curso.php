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
    $nome = strtoupper($nome);

    $sql = "INSERT INTO cursos (nome) VALUES ('$nome')";
    
    if ($conn->query($sql) === TRUE) {
        echo"<script>alert('CURSO CADASTRADO COM SUCESSO!');history.go(-2);</script>";
    } else {
        echo "Erro ao cadastrar curso: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar curso</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #2B4570;
        }
    </style>
</head>
<body style="background-color: #1C2E4A">

<?php include('navbar.php');?>
    <div class="container mt-5">
        <h4 style="color:white">Cadastrar curso: </h4>
        <div class="row justify-content-end">
            <div class="col-2">            
            <a href="listar_cursos.php" class="btn btn-primary mt-2">Voltar</a>
            </div>
        </div>
        <form method="post" action="cadastrar_curso.php">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Curso:</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
        
    </div>
</body>
</html>