

<?php
session_start();

$usuario = $_SESSION['usuario'] ?? null;

require_once "dao/NoticiaDAO.php";

$dao = new NoticiaDAO();
$noticias = $dao->listar();
require_once "./dao/HistoriaDAO.php";

$dao = new HistoriaDAO();
$eventos = $dao->hoje();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecos do passado</title>
    <link rel="icon" type="image/png" sizes="35x35" href="./assets/home.png">
    <link rel="stylesheet" href="./style.css">
    <script src="./js.js"></script>
</head>
<body>

<div class="container">
<div class="card">

<img src="./assets/Ecos do Passado.png" alt="Logo" class="logo">

<?php


if (!isset($_SESSION['usuario'])) {
    echo "<a href='./views/verificarcadastro.php'><button>Cadastre-se!</button></a>";
    echo "<a href='./views/Login.php'><button>Entre!</button></a>";
}
if (isset($_SESSION['usuario'])) {
    echo"<a href='./views/criar_noticia.php'><button>Nova Notícia</button></a>";
}
?>
<a href="./views/hoje.php"><button>Hoje na História</button></a>

</div>
<?php if (isset($_SESSION['usuario'])): ?>
<div class="perfil-container">

<?php
    $imagem = (!empty($usuario['imagem']) && file_exists("uploads/" . $usuario['imagem']))
        ? $usuario['imagem']
        : 'padrao.png';
    ?>

    <img src="uploads/<?= urlencode($imagem); ?>" class="avatar" onclick="toggleMenu()">

    <div id="menuPerfil" class="menu-perfil">
        <a href="views/editar_usuario.php">Editar</a>
        <a href="./controllers/excluir_usuario.php"
        onclick="return confirm('Tem certeza que deseja excluir sua conta?');">Excluir</a>
        <a href="./controllers/logout.php">Sair</a>

        
    <div class="menu-info">
        <p>Email:</p>
        <p><?= $usuario['email']; ?></p>
    </div>

    </div>

</div>
<?php endif; ?>
    

<h1 class="titulo-secao">Hoje na História</h1>

<style>
    .evento-card{
        margin-right: 20px;
        margin-left: 10px;
    }
</style>

<div class="eventos-container">
<?php if (!empty($eventos)): 
    $e = $eventos[0]; // pega só o primeiro
?>
    <div class="evento-card destaque">

        <div class="evento-data">
            <?= date('d/m', strtotime($e['data_historica'])) ?>
        </div>

        <div class="evento-info">
            <p><?= $e['evento'] ?></p>
            <span><?= date('Y', strtotime($e['data_historica'])) ?></span>
        </div>

    </div>
<?php endif; ?>
</div>
<div class="ver-mais-container">
    <a href="./views/hoje.php">
        <button class="ver-mais">Ver todos os eventos</button>
    </a>
</div>

<div class="tt">
<h1>Ecos do <br>PASSADO</h1>
</div>
    <div class="noticias">

<?php foreach ($noticias as $n): ?>

    
    <div class="noticia-card">

        <div class="noticia-topo">
            <div class="autor-box">
                <?php
                $caminho = "uploads/" . $n['autor_imagem'];

                $imagem = (!empty($n['autor_imagem']) && file_exists($caminho))
                    ? $n['autor_imagem']
                    : 'padrao.png';
                ?>

                <img src="uploads/<?= urlencode($imagem); ?>" class="avatar-mini">
                <span><?= $n['autor_nome'] ?></span>
            </div>

            <span class="data"><?= $n['data'] ?></span>
        </div>

        <h2><?= $n['titulo'] ?></h2>

        <div class="acoes">
            <a href="views/ver_noticia.php?id=<?= $n['id'] ?>">
                <button class="ver">Ler mais</button>
            </a>

            <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $n['autor']): ?>

                <a href="views/editar_noticia.php?id=<?= $n['id'] ?>">
                    <button class="editar">Editar</button>
                </a>

                <form action="controllers/excluir_noticia.php" method="POST" onsubmit="return confirm('Tem certeza?');">
                    <input type="hidden" name="id" value="<?= $n['id'] ?>">
                    <button class="excluir" type="submit">Excluir</button>
                </form>

            <?php endif; ?>
        </div>

    </div>
<?php endforeach; ?>

</div>

</div>
</body>
</html>

