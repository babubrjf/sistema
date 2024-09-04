<?php
session_start();
include 'config.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

$curso_id = $_GET['curso_id'];

$sql = "SELECT * FROM Cursos WHERE curso_codigo = '$curso_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: erro.php");    
} else {
    $sql = "DELETE FROM cursos WHERE codigo='$curso_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo"<script>alert('CURSO DELETADO COM SUCESSO!');history.go(-2);</script>";
    } else {
        echo "Erro ao deletar curso: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Deletar curso</title>
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
    <a href="listar_cursos.php" class="btn btn-primary mb-2">Voltar</a>
</div>

</body>
</html>