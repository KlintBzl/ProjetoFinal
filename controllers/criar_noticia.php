<?php
session_start();
require_once "../dao/NoticiaDAO.php";

if (!isset($_SESSION['usuario'])) {
    header("Location: ../views/login.php");
    exit;
}

if ($_POST) {

    $titulo = $_POST['titulo'];
    $noticia = $_POST['noticia'];
    $autor = $_SESSION['usuario']['id'];

    $imagemNome = null;

    // Upload da imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {

        $pasta = "../assets/img/";
        $imagemNome = time() . "_" . $_FILES['imagem']['name'];

        move_uploaded_file($_FILES['imagem']['tmp_name'], $pasta . $imagemNome);
    }

    $dao = new NoticiaDAO();

    if ($dao->criar($titulo, $noticia, $autor, $imagemNome)) {
        echo "Notícia criada com sucesso!";
        header("refresh:2;url=index.php");
    } else {
        echo "Erro ao criar notícia!";
    }
}