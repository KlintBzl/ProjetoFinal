<?php
require_once "../models/Usuario.php";
require_once "../dao/UsuarioDAO.php";

if ($_POST) {

    $usuario = new Usuario();
    $usuario->setNome( $_POST['nome']);
    $usuario->setEmail($_POST['email']);
    $usuario->setSenha($_POST['senha']);

    $dao = new UsuarioDAO();

    if ($dao->cadastrar($usuario)) {
        echo "Cadastro realizado com sucesso!";
        header("refresh:2;url=../index.php");
        exit;
    } else {
        echo "Erro ao cadastrar!";
    }
}