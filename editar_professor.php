<?php
session_start();
include 'config.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_SESSION['id'];
$nome =  $_SESSION['nome'];
$professor_id = $_GET['professor_id']

.$sql_query = "SELECT * FROM Professores WHERE codigo = ".$_GET["professor_id"];
if ($result = $conn -> query($sql_query)) {
    while ($row = $result -> fetch_assoc()) { 
        $codigo = $row['codigo'];
        $nome_professor = $row['nome'];
        $email_professor = $row['email'];
        $senha_professor = $row['senha'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if($nome != "" && $email != "" && $senha != ""){
    $sql = "UPDATE Professores SET nome = '$nome', email = '$email', senha = '$senha' WHERE codigo = '$professor_id'";
        if ($conn->query($sql) === TRUE) {
            echo"<script>alert('PROFESSOR(A) ATUALIZADO(A) COM SUCESSO!');history.go(-2);</script>";
        } else {
            echo "Erro ao atualizar professor: " . $conn->error;
        }
    } else {
    echo"<script>alert('TODOS OS CAMPOS DEVEM SER PREENCHIDOS!');history.go(0);</script>";
    header("refresh:2;url=index.php");
    }
}
    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Professor</title>
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
            <span class="navbar-brand mb-0 h1 text-white" onclick="window.location.href= 'listar_professores.php'" role="button">Bem-vindo(a), <?php echo $nome; ?></span>                                                
            <a href="logout.php" class="btn btn-danger">Sair</a>
        </div>
    </nav>
    <div class="container mt-5">
        <h4 style="color:white">Editar Professor: </h4>
        <form method="post" action="editar_professor.php?<?php echo $_SERVER["QUERY_STRING"]?>">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" class="form-control" value="<?php echo $nome_professor; ?>" placeholder="Nome Completo" required>
                <label for="email" class="form-label">E-mail:</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email_professor; ?>" placeholder="E-mail" required>
                <label for="senha" class="form-label">Senha:</label>
                <input type="text" name="senha" class="form-control" value="<?php echo $senha_professor; ?>" placeholder="Senha" required>
            </div>
            <button type="submit" class="btn btn-success">Concluir</button>
        </form>
        
    </div>
</body>
</html>