<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM professores WHERE email='$email' AND senha='$senha'";
    $result = $conn->query($sql);
    print_r($result); 

    if ($result->num_rows > 0) {
        $professor = $result->fetch_assoc();
        $_SESSION['id'] = $professor['codigo'];
        $_SESSION['nome'] = $professor['nome'];
        $_SESSION['tipo'] = $professor['tipo'];
        if ($_SESSION['tipo'] === 'adm'){
            header("Location: listar_professores.php");
        } elseif ($_SESSION['tipo'] === 'prof'){
            header("Location: listar_turmas.php");
        }
    } else {
        header("Location: index.php");
    }
}
?>