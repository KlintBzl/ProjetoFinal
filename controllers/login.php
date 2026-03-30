<?php
session_start();

require_once "../dao/UsuarioDAO.php";

if ($_POST) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $dao = new UsuarioDAO();
    $usuario = $dao->login($email, $senha);

    if ($usuario) {
        $_SESSION['usuario'] = $usuario;

        header("Location: ../index.php");
        exit;
    } else {
        echo "Email ou senha inválidos!";
    }
}