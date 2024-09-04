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
    $curso = $_POST['curso'];
    $professor_nome = $_SESSION['nome'];

    $sql = "INSERT INTO turmas (curso, nome, professor_codigo) VALUES ('$curso' ,'$nome', '$id')";
    
    if ($conn->query($sql) === TRUE) {
        echo"<script>alert('TURMA CADASTRADA COM SUCESSO!');history.go(-2);</script>";
    } else {
        echo "Erro ao cadastrar turma: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar turma</title>
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
        <h4 style="color:white">Cadastrar turma: </h4>
        <div class="row justify-content-end">
            <div class="col-2">            
            <a href="listar_turmas.php" class="btn btn-primary mt-2">Voltar</a>
            </div>
        </div>
        <form method="post" action="cadastrar_turma.php">
            <div class="mb-3">
                <label for="curso"><h5 style="color:white">CURSO:</h5></label>
                <select id="curso">
                <option value="HT-SIS-MANHA">HT-SIS-MANHA</option>
                <option value="HT-SDT-TARDE">HT-SDT-TARDE</option>
                </select>
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
        
    </div>
</body>
</html>