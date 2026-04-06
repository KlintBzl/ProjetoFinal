<?php
session_start();
require_once "../dao/UsuarioDAO.php";

$usuario = $_SESSION['usuario'];

if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {

    $pasta = "../uploads/";

    // 🔥 remover imagem antiga (se existir)
    if (!empty($usuario['imagem']) && file_exists($pasta . $usuario['imagem'])) {
        unlink($pasta . $usuario['imagem']);
    }

    // 🔥 limpar nome
    $nomeOriginal = $_FILES['imagem']['name'];
    $nomeLimpo = preg_replace("/[^a-zA-Z0-9.\-]/", "_", $nomeOriginal);

    $nomeArquivo = uniqid() . "_" . $nomeLimpo;
    $caminho = $pasta . $nomeArquivo;

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho)) {

        $dao = new UsuarioDAO();
        $dao->atualizar($usuario['id'], $usuario['nome'], $usuario['email'], null, $nomeArquivo);

        // 🔥 atualizar sessão
        $_SESSION['usuario']['imagem'] = $nomeArquivo;

        header("Location: ../views/Conta.php");
        exit;
    }
}