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

$sql = "SELECT * FROM Turmas WHERE professor_codigo='$id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Listar Turmas</title>
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
        <h4 style="color:white">Turmas: </h4>
        <div class="row justify-content-end">
            <div class="col-2">            
            <a href="cadastrar_turma.php" class="btn btn-success mb-2">Cadastrar Turmas</a>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Curso</th>
                    <th>Nome</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td >".$row['codigo']."</td>";
                        echo "<td >".$row['curso']."</td>";
                        echo "<td>".$row['nome']."</td>";
                        echo "<td><a href='listar_atividades.php?turma_id=".$row['codigo']."' class='btn btn-info btn-sm'>Atividades</a> ";
                        echo "<button onclick=\"confirmDeletion('{$row['codigo']}', '{$row['nome']}')\" class='btn btn-danger btn-sm'>Deletar</button>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhuma turma cadastrada</td></tr>";
                }
                ?>
            </tbody>
        </table>        
    </div>

    <script>
        function confirmDeletion(id, turma) {
            let result = confirm("Deseja Deletar essa turma: " + turma + "?");
            if (result === true) {
                window.location.href = 'deletar_turma.php?turma_id=' + id;
            }
        }
    </script>
</body>
</html>