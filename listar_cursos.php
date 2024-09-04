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

$sql = "SELECT * FROM Cursos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Listar Cursos</title>
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
            <span class="navbar-brand mb-0 h1 text-white" role="button">Bem-vindo(a), <?php echo $nome; ?></span>
            <div class="topnav">
                <a class="btn btn-light" href="listar_professores.php">Listar Professores</a>
                <a class="btn btn-dark" href="listar_cursos.php">Listar Cursos</a>
            </div>                          
            <a href="logout.php" class="btn btn-danger">Sair</a>
        </div>
    </nav>
    <div class="container mt-5">
        <h4 style="color:white">Cursos:</h4>
        <div class="row justify-content-end">
            <div class="col-2">            
            <a href="cadastrar_curso.php" class="btn btn-success mb-2">Cadastrar Curso</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead style="color:white">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th >Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr style='color:white'>";
                        echo "<td>".$row['codigo']."</td>";
                        echo "<td>".$row['nome']."</td>";
                        echo "<td><button onclick=\"confirmDeletion('{$row['codigo']}', '{$row['nome']}')\" class='btn btn-danger btn-sm'>Deletar</button>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhum curso cadastrado</td></tr>";
                }
                ?>
            </tbody>
        </table>        
    </div>

    <script>
        function confirmDeletion(id, curso) {
            let result = confirm("Deseja Deletar esse curso: " + curso + "?");
            if (result === true) {
                window.location.href = 'deletar_curso.php?curso_id=' + id;
            }
        }
    </script>
</body>
</html>