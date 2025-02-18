<?php
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location: index.php");
        exit();
    }

    $nome = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
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
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert">VOCÊ NÃO PODE EXCLUIR UMA TURMA COM ATIVIDADES CADASTRADAS!</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="listar_turmas.php" class="btn btn-primary mb-2">Voltar</a>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.js"></script>
</body>
</html>