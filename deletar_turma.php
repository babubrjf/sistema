<?php
session_start();
include 'config.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

$turma_id = $_GET['turma_id'];

$sql = "SELECT * FROM Atividades WHERE turma_codigo = '$turma_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: erro.php");    
} else {
    $sql = "DELETE FROM turmas WHERE codigo='$turma_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo"<script>alert('TURMA DELETADA COM SUCESSO!');history.go(-2);</script>";
    } else {
        echo "Erro ao deletar turma: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Deletar turma</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #2B4570;
        }
    </style>
</head>
<body style="background-color: #1C2E4A">

<div class="row">
    <div class="col-12 d-flex justify-content-center">
    <a href="listar_turmas.php" class="btn btn-primary mb-2">Voltar</a>
</div>

</body>
</html>