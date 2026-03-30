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

</head>
<body>

<a href="./views/Cadastro.php"><button>Cadastre-se!</button></a>
<a href="./views/Login.php"><button>Entre!</button></a>
<?php

if (isset($_SESSION['usuario'])) {
    echo"<a href='./views/Conta.php'><button>Conta</button></a>";
    echo"<a href='./views/criar_noticia.php'><button>Nova Notícia</button></a>";
}
?>

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
                    <a href="views/ver_noticia.php?id=<?= $n['id'] ?>">Ver</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

    
</body>
</html>

