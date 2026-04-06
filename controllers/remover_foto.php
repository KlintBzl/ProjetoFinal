<?php
session_start();
require_once "../dao/UsuarioDAO.php";

$usuario = $_SESSION['usuario'];
$pasta = "../uploads/";

// 🔥 remove arquivo
if (!empty($usuario['imagem']) && file_exists($pasta . $usuario['imagem'])) {
    unlink($pasta . $usuario['imagem']);
}

// 🔥 remove do banco
$dao = new UsuarioDAO();
$dao->atualizar($usuario['id'], $usuario['nome'], $usuario['email'], null, null);

// 🔥 atualiza sessão
$_SESSION['usuario']['imagem'] = null;

header("Location: ../views/Conta.php");
exit;