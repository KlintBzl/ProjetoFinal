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

<form method="GET">
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

    <h3>Tem certeza que deseja excluir?</h3>

    <p><strong>Evento:</strong> <?= $eventoSelecionado['evento'] ?></p>
    <p><strong>Data:</strong> <?= $eventoSelecionado['data_historica'] ?></p>

    <?php if ($eventoSelecionado['imagem']): ?>
        <img src="../assets/img/<?= $eventoSelecionado['imagem'] ?>" width="150"><br><br>
    <?php endif; ?>

    <form action="../controllers/excluir_historia.php" method="POST"
          onsubmit="return confirm('Tem certeza que deseja excluir este evento?');">

        <input type="hidden" name="id" value="<?= $eventoSelecionado['id'] ?>">

        <button type="submit">Excluir</button>
    </form>

<?php endif; ?>