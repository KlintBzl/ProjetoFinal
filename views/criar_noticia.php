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
</head>
<body>

<div class="card">

<img src="../assets/Ecos do Passado.png" alt="Logo" class="logo">

</div>

<div class="login-container">

    <div class="login-card editor">

        <h2>Nova Notícia</h2>

        <form class="forms" action="../controllers/criar_noticia.php" method="POST" enctype="multipart/form-data">

            <input type="text" id="ttlo" name="titulo" placeholder="Título da notícia" required>

            <textarea name="noticia" id="not" placeholder="Escreva a notícia..." required></textarea>

            <label class="upload-label">
                Adicionar imagem
                <input type="file" name="imagem">
            </label>

            <button type="submit">Publicar</button>

        </form>

        <a href="../index.php" class="voltar">← Voltar</a>

    </div>

</div>

</body>
</html>