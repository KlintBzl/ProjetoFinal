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

<a href="../index.php"><button>⬅ Voltar</button></a>

<h1 class="tt"><?= $noticia['titulo'] ?></h1>

<div class="autor-info">

    <?php
    $caminho = "../uploads/" . $noticia['autor_imagem'];

    $imagem = (!empty($noticia['autor_imagem']) && file_exists($caminho))
        ? $noticia['autor_imagem']
        : 'padrao.png';
    ?>

    <img src="../uploads/<?= urlencode($imagem); ?>" class="avatar-mini">
    
    <span><?= $noticia['autor_nome'] ?></span>

    <span class="data">
        | 📅 <?= date('d/m/Y H:i', strtotime($noticia['data'])) ?>
    </span>

</div>

<hr>

<?php if ($noticia['imagem']): ?>
    <img src="../assets/img/<?= $noticia['imagem'] ?>" width="400">
<?php endif; ?>

<hr>

<p>
    <?= nl2br($noticia['noticia']) ?>
</p>

</body>
</html>