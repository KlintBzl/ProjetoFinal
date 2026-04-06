<?php
require_once "../models/Usuario.php";
require_once "../dao/UsuarioDAO.php";

if ($_POST) {
    $nomeImagem = null;

    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {

    $pasta = "../uploads/";

    if (!is_dir($pasta)) {
        mkdir($pasta, 0755, true);
    }

    $nomeOriginal = $_FILES['imagem']['name'];
    $nomeLimpo = preg_replace("/[^a-zA-Z0-9.\-]/", "_", $nomeOriginal);

    $nomeArquivo = uniqid() . "_" . $nomeLimpo;

    $caminho = $pasta . $nomeArquivo;

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho)) {
        $nomeImagem = $nomeArquivo;
    } else {
        die("Erro ao fazer upload da imagem");
    }
}

    $usuario = new Usuario();
    $usuario->setNome($_POST['nome']);
    $usuario->setEmail($_POST['email']);
    $usuario->setSenha($_POST['senha']);
    $usuario->setImagem($nomeImagem);

    $dao = new UsuarioDAO();

    if ($dao->cadastrar($usuario)) {
        echo "Cadastro realizado com sucesso!";
        header("refresh:2;url=../index.php");
        exit;
    } else {
        echo "Erro ao cadastrar!";
    }
}