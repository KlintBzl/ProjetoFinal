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
    <link rel="stylesheet" href="../style_edit.css">
</head>
<body>

<div class="login-container">

    <div class="login-card editor">

        <h2>Editar Notícia</h2>

        <form class="forms" action="../controllers/editar_noticia.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $noticia['id'] ?>">

            <input type="text" name="titulo" value="<?= $noticia['titulo'] ?>" placeholder="Título">

            <textarea id="not" name="noticia" required><?= $noticia['noticia'] ?></textarea>

            <!-- upload -->
            <label class="upload-label">
                Alterar imagem
                <input type="file" name="imagem">
            </label>

            <button type="submit">Salvar Alterações</button>

        </form>

        <a href="../index.php" class="voltar">← Voltar</a>

    </div>

</div>

</body>
</html>