<?php
session_start();
include 'config.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_SESSION['id'];
$nome = $_SESSION['nome'];
$turma_id = $_GET['turma_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO Atividades (descricao, turma_codigo) VALUES ('$descricao', '$turma_id')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: listar_turmas.php?turma_id=".$turma_id);
    } else {
        echo "Erro ao cadastrar descricao: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Atividades</title>
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


        <h3>Cadastrar Atividade: </h3>
        <div class="row justify-content-end">
            <div class="col-2">            
            <a href="listar_turmas.php" class="btn btn-primary mt-2">Voltar</a>
            </div>
        </div>
        <form method="post" action="cadastrar_atividade.php?turma_id=<?php echo $turma_id; ?>">
            <div class="mb-3">


                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" required></textarea>
            </div>

            
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
        
    </div>
</body>
</html>