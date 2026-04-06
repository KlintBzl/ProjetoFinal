<?php
session_start();
require_once "../dao/NoticiaDAO.php";

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id'])) {
    echo "ID não informado";
    exit;
}

$dao = new NoticiaDAO();
$noticia = $dao->buscarPorId($_GET['id']);

// Segurança: só o autor pode editar
if ($noticia['autor'] != $_SESSION['usuario']['id']) {
    echo "Acesso negado!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Notícia</title>
    <link rel="icon" type="image/png" sizes="35x35" href="../assets/Bernadit.png">
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>Editar Notícia</h2>

<form class="forms" action="../controllers/editar_noticia.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $noticia['id'] ?>">

    <input type="text" name="titulo" value="<?= $noticia['titulo'] ?>" required>
    <br><br>

    <textarea name="noticia" required><?= $noticia['noticia'] ?></textarea>
    <br><br>

    <!-- imagem atual -->
    <?php if ($noticia['imagem']): ?>
        <img src="../assets/img/<?= $noticia['imagem'] ?>" width="200">
        <br><br>
    <?php endif; ?>

    <!-- nova imagem -->
    <input type="file" name="imagem">
    <br><br>

    <button type="submit">Salvar</button>

</form>

<a href="../index.php"><button>Voltar</button></a>

</body>
</html>