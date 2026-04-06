    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/png" sizes="35x35" href="../assets/cluir.png">

<?php
session_start();
require_once "../dao/HistoriaDAO.php";

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$dao = new HistoriaDAO();
$usuario_id = $_SESSION['usuario']['id'];

// lista só eventos do usuário
$eventos = $dao->listarPorUsuario($usuario_id);

// evento selecionado
$eventoSelecionado = null;
if (isset($_GET['id'])) {
    $eventoSelecionado = $dao->buscarPorId($_GET['id']);

    if ($eventoSelecionado && $eventoSelecionado['usuario_id'] != $usuario_id) {
        echo "Acesso negado!";
        exit;
    }
}
?>

<h2>Excluir Evento</h2>

<form class="forms" method="GET">
    <label>Escolha o evento:</label><br>
    <select name="id" onchange="this.form.submit()">
        <option value="">-- Selecione --</option>

        <?php foreach ($eventos as $e): ?>
            <option value="<?= $e['id'] ?>"
                <?= (isset($_GET['id']) && $_GET['id'] == $e['id']) ? 'selected' : '' ?>>
                
                <?= $e['id'] ?> - <?= substr($e['evento'], 0, 30) ?>...
            </option>
        <?php endforeach; ?>

    </select>
    
</form>


<br><br>

<?php if ($eventoSelecionado): ?>

    <div class="fundo">
    <h3>Tem certeza que deseja excluir?</h3>

    <p><strong>Evento:</strong> <?= $eventoSelecionado['evento'] ?></p>
    <p><strong>Data:</strong> <?= $eventoSelecionado['data_historica'] ?></p>
    </div>

    <?php if ($eventoSelecionado['imagem']): ?>
        <img src="../assets/img/<?= $eventoSelecionado['imagem'] ?>" width="150"><br><br>
    <?php endif; ?>

    <form action="../controllers/excluir_historia.php" method="POST"
          onsubmit="return confirm('Tem certeza que deseja excluir este evento?');">

        <input type="hidden" name="id" value="<?= $eventoSelecionado['id'] ?>">

        <button type="submit">Excluir</button>
    </form>

<a href="./hoje.php"><button>Voltar</button></a>

<?php endif; ?>