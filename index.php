<?php
session_start();

require_once "dao/NoticiaDAO.php";

$dao = new NoticiaDAO();
$noticias = $dao->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal</title>
    <link rel="icon" type="image/png" sizes="35x35" href="./assets/home.png">
    <link rel="stylesheet" href="./style.css">
</head>
<body>


<?php

if (!isset($_SESSION['usuario'])) {
    echo "<a href='./views/Cadastro.php'><button>Cadastre-se!</button></a>";
    echo "<a href='./views/Login.php'><button>Entre!</button></a>";
}
if (isset($_SESSION['usuario'])) {
    echo"<a href='./views/Conta.php'><button>Conta</button></a>";
    echo"<a href='./views/criar_noticia.php'><button>Nova Notícia</button></a>";
}
?>
<a href="./views/hoje.php"><button>Hoje na História</button></a>
<h1>Linha do tempo de Notícias</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($noticias as $n): ?>
            <tr>
                <td><?= $n['id'] ?></td>
                <td><?= $n['titulo'] ?></td>
                <td><?= $n['autor_nome'] ?></td>
                <td><?= $n['data'] ?></td>

<td>
    <a href="views/ver_noticia.php?id=<?= $n['id'] ?>"><button>Ver</button></a>

    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $n['autor']): ?>

        | <a href="views/editar_noticia.php?id=<?= $n['id'] ?>"><button>Editar</button></a>

        | 
        <form action="controllers/excluir_noticia.php" method="POST" style="display:inline;"
              onsubmit="return confirm('Tem certeza que deseja excluir esta notícia?');">

            <input type="hidden" name="id" value="<?= $n['id'] ?>">
            <button type="submit">Excluir</button>

        </form>

    <?php endif; ?>
</td>
            </tr>
        <?php endforeach; ?>

    </table>

    
</body>
</html>

