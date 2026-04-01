<?php
session_start();
require_once "../dao/NoticiaDAO.php";

if (!isset($_SESSION['usuario'])) {
    header("Location: ../views/login.php");
    exit;
}

// 🔒 Só aceita POST (segurança)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $autor = $_SESSION['usuario']['id'];

    $dao = new NoticiaDAO();

    if ($dao->excluir($id, $autor)) {
        header("Location: ../index.php?msg=excluido");
        exit;
    } else {
        echo "Erro ao excluir ou acesso negado!";
    }
}