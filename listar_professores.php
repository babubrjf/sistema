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

$sql = "SELECT * FROM Professores";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Listar Professores</title>
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
            <span class="navbar-brand mb-0 h1 text-white">Bem-vindo(a), <?php echo $nome; ?></span>
            <div class="topnav">
                <a class="btn btn-dark" href="listar_professores.php">Listar Professores</a>
                <a class="btn btn-light" href="listar_cursos.php">Listar Cursos</a>
            </div>                          
            <a href="logout.php" class="btn btn-danger">Sair</a>
        </div>
    </nav>
    <div class="container mt-5">
        <h4 style="color:white">Professores:</h4>
        <div class="row justify-content-end">
            <div class="col-2">            
            <a href="cadastrar_professor.php" class="btn btn-success mb-2">Cadastrar Professor(a)</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead style="color:white">
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr style='color:white'>";
                        echo "<td>".$row['codigo']."</td>";
                        echo "<td>".$row['nome']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td><a href='editar_professor.php?professor_id=".$row['codigo']."' class='btn btn-info btn-sm'>Editar</a> ";
                        echo "<td><button onclick=\"confirmDeletion('{$row['codigo']}', '{$row['nome']}')\" class='btn btn-danger btn-sm'>Deletar</button>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhum professor cadastrado</td></tr>";
                }
                ?>
            </tbody>
        </table>        
    </div>

    <script>
        function confirmDeletion(id, professor) {
            let result = confirm("Deseja Deletar esse professor: " + professor + "?");
            if (result === true) {
                window.location.href = 'deletar_professor.php?professor_id=' + id;
            }
        }
    </script>
</body>
</html>