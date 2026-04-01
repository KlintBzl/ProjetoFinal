<?php
session_start();
require_once "../dao/NoticiaDAO.php";

if (!isset($_SESSION['usuario'])) {
    header("Location: ../views/login.php");
    exit;
}

if ($_POST) {

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $noticia = $_POST['noticia'];
    $autor = $_SESSION['usuario']['id'];

    $imagemNome = null;

    // Upload nova imagem (opcional)
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {

        $pasta = "../assets/img/";
        $imagemNome = time() . "_" . $_FILES['imagem']['name'];

        move_uploaded_file($_FILES['imagem']['tmp_name'], $pasta . $imagemNome);
    }

    $dao = new NoticiaDAO();

    if ($dao->atualizar($id, $titulo, $noticia, $autor, $imagemNome)) {
        echo "Notícia atualizada com sucesso!";
        header("refresh:2;url=../index.php");
    } else {
        echo "Erro ao atualizar!";
    }
}