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
</head>
<body>

<a href="../index.php"><button>⬅ Voltar</button></a>

<h1 class="tt"><?= $noticia['titulo'] ?></h1>

<p>
    👤 <?= $noticia['autor_nome'] ?> |
    📅 <?= date('d/m/Y H:i', strtotime($noticia['data'])) ?>
</p>

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