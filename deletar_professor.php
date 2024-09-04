<?php
session_start();
include 'config.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

$professor_id = $_GET['professor_id'];

$sql = "SELECT * FROM Professores WHERE professor_codigo = '$professor_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: erro.php");    
} else {
    $sql = "DELETE FROM Professores WHERE codigo='$professor_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo"<script>alert('PROFESSOR(A) DELETADO COM SUCESSO!');history.go(-2);</script>";
    } else {
        echo "Erro ao deletar professor: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Deletar Professor</title>
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
    <a href="listar_professores.php" class="btn btn-primary mb-2">Voltar</a>
</div>

</body>
</html>