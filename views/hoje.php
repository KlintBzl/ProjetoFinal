<link rel="icon" type="image/png" sizes="35x35" href="../assets/Hoje.png">
<link rel="stylesheet" href="../style.css">
<script src="../js.js"></script>

<?php
session_start();

$usuario = $_SESSION['usuario'] ?? null;

require_once "../dao/HistoriaDAO.php";

$dao = new HistoriaDAO();
$eventos = $dao->hoje();
$eventosO = $dao->ontem();
?>
<div class="container">
<div class="card">
<a href="../index.php"><button>Voltar</button></a>
<?php if (isset($_SESSION['usuario'])): ?>
    <a href="./criar_historia.php"><button>Novo Evento</button></a>
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
        <a href="./editar_usuario.php">Editar</a>
        <a href="../controllers/excluir_usuario.php">Excluir</a>
        <a href="../controllers/logout.php">Sair</a>

        <div class="menu-info">
            <p>Email:</p>
            <p><?= $usuario['email']; ?></p>
        </div>
    </div>

</div>
</div>
    

<h1 class="titulo-secao">Hoje na História</h1>

<div class="eventos-container">
<?php foreach ($eventos as $e): ?>
    <div class="evento-card">
        <div class="evento-data">
            <?= date('d/m', strtotime($e['data_historica'])) ?>
        </div>

        <div class="evento-info">
            <p><?= $e['evento'] ?></p>
            <span><?= date('Y', strtotime($e['data_historica'])) ?></span>
        </div>
    </div>
<?php endforeach; ?>
</div>


<h1 class="titulo-secao">Ontem na História</h1>

<div class="eventos-container">
<?php foreach ($eventosO as $e): ?>
    <div class="evento-card">
        <div class="evento-data">
            <?= date('d/m', strtotime($e['data_historica'])) ?>
        </div>

        <div class="evento-info">
            <p><?= $e['evento'] ?></p>
            <span><?= date('Y', strtotime($e['data_historica'])) ?></span>
        </div>
    </div>
<?php endforeach; ?>
</div>