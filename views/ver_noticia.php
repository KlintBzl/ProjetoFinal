<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "../dao/NoticiaDAO.php";

if (!isset($_GET['id'])) {
    echo "Notícia não encontrada!";
    exit;
}

$id = $_GET['id'];

$dao = new NoticiaDAO();
$noticia = $dao->buscarPorId($id);

if (!$noticia) {
    echo "Notícia não existe!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $noticia['titulo'] ?></title>
    <link rel="icon" type="image/png" sizes="35x35" href="../assets/ver.png">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../style_ver.css">
</head>
<body>

<div class="card">

<img src="../assets/Ecos do Passado.png" alt="Logo" class="logo">

</div>
<div class="pagina-noticia">

    <div class="topo-noticia">
        <a href="../index.php" class="btn-voltar">⬅ Voltar</a>
    </div>

    <div class="conteudo-noticia">

        <h1 class="titulo"><?= $noticia['titulo'] ?></h1>

        <div class="autor-info">
            <?php
            $caminho = "../uploads/" . $noticia['autor_imagem'];

            $imagem = (!empty($noticia['autor_imagem']) && file_exists($caminho))
                ? $noticia['autor_imagem']
                : 'padrao.png';
            ?>

            <img src="../uploads/<?= urlencode($imagem); ?>" class="avatar-mini">

            <div>
                <strong><?= $noticia['autor_nome'] ?></strong>
                <p class="data">
                    📅 <?= date('d/m/Y H:i', strtotime($noticia['data'])) ?>
                </p>
            </div>
        </div>

        <?php if ($noticia['imagem']): ?>
            <div class="imagem-noticia">
                <img src="../assets/img/<?= $noticia['imagem'] ?>">
            </div>
        <?php endif; ?>

        <div class="texto-noticia">
            <?= nl2br($noticia['noticia']) ?>
        </div>

    </div>

</div>

</body>
</html>

<style> 
    .topo-noticia{
        margin-right: 10px;
    }
</style>