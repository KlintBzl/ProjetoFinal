<?php
session_start();
require_once "../dao/UsuarioDAO.php";

if (!isset($_SESSION['usuario'])) {
    header("Location: ../views/login.php");
    exit;
}

$dao = new UsuarioDAO();
$id = $_SESSION['usuario']['id'];

if ($dao->excluir($id)) {

    // Destrói sessão
    session_destroy();

    header("Location: ../views/login.php");
    exit;

} else {
    echo "Erro ao excluir conta!";
}