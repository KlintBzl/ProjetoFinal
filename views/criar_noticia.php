<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Criar Notícia</title>
    <link rel="icon" type="image/png" sizes="35x35" href="../assets/newss.png">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../style_edit.css">
</head>
<body>

<h2>Nova Notícia</h2>

<form class="forms" action="../controllers/criar_noticia.php" method="POST" enctype="multipart/form-data">

    <input type="text" id="ttlo" name="titulo" placeholder="Título" required>
    <br><br>

    <textarea name="noticia" id="not" placeholder="Escreva a notícia..." required></textarea>
    <br><br>

    <input type="file" name="imagem">
    <br><br>

    <button type="submit">Publicar</button>

</form>
<a href="../index.php"><button>Voltar</button></a>

</body>
</html>