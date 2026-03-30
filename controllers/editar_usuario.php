<?php
session_start();
require_once "../dao/UsuarioDAO.php";

if (!isset($_SESSION['usuario'])) {
    header("Location: ../views/login.php");
    exit;
}

$dao = new UsuarioDAO();
$id = $_SESSION['usuario']['id'];

if ($_POST) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Se senha estiver vazia, não altera
    if (empty($senha)) {
        $senha = null;
    }

    if ($dao->atualizar($id, $nome, $email, $senha)) {

        // Atualiza sessão também (IMPORTANTE)
        $_SESSION['usuario']['nome'] = $nome;
        $_SESSION['usuario']['email'] = $email;

        echo "Dados atualizados com sucesso!";
        header("refresh:2;url=index.php");
        exit;
    } else {
        echo "Erro ao atualizar!";
    }
}