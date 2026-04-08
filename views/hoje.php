<link rel="icon" type="image/png" sizes="35x35" href="../assets/Hoje.png">
<link rel="stylesheet" href="../style.css">
<script src="../js.js"></script>

<?php
session_start();

$usuario = $_SESSION['usuario'] ?? null;

require_once "../dao/HistoriaDAO.php";

$dao = new HistoriaDAO();
$eventos = $dao->hoje();
?>
<div class="container">
<div class="card">
<a href="../index.php"><button>Voltar</button></a>
<?php if (isset($_SESSION['usuario'])): ?>
    <a href="./criar_historia.php"><button>Novo Evento</button></a>
</div><div class="card">
    <a href="./editar_historia.php"><button>Editar Evento</button></a>    
    <a href="./excluir_historia.php"><button>Excluir Evento</button></a>    
    <?php endif; ?>
</div><div class="perfil-container">

<?php
    $imagem = (!empty($usuario['imagem']) && file_exists("../uploads/" . $usuario['imagem']))
        ? $usuario['imagem']
        : 'padrao.png';
    ?>

    <img src="../uploads/<?= urlencode($imagem); ?>" class="avatar" onclick="toggleMenu()">

    <div id="menuPerfil" class="menu-perfil">
        <a href="views/editar_usuario.php">Editar</a>
        <a href="../controllers/excluir_usuario.php">Excluir</a>
        <a href="../controllers/logout.php">Sair</a>

        <div class="menu-info">
            <p>Email:</p>
            <p><?= $usuario['email']; ?></p>
        </div>
    </div>

</div>
</div>
    

<h1>Hoje na História</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Evento</th>
        <th>Data</th>
    </tr>

    <?php foreach ($eventos as $e): ?>
        <tr>
            <td><?= $e['id'] ?></td>
            <td><?= $e['evento'] ?></td>
            <td><?= date('d/m/Y', strtotime($e['data_historica'])) ?></td>
        </tr>
    <?php endforeach; ?>

</table>

<h1>Ontem na História</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Evento</th>
        <th>Data</th>
    </tr>

    <?php foreach ($eventos as $e): ?>
        <tr>
            <td><?= $e['id'] ?></td>
            <td><?= $e['evento'] ?></td>
            <td><?= date('d/m/Y', strtotime($e['data_historica'])) ?></td>
        </tr>
    <?php endforeach; ?>

</table>