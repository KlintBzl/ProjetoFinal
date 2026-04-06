    <link rel="icon" type="image/png" sizes="35x35" href="../assets/judit.png">
    <link rel="stylesheet" href="../style.css">
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

// se escolheu um ID
$eventoSelecionado = null;
if (isset($_GET['id'])) {
    $eventoSelecionado = $dao->buscarPorId($_GET['id']);
    if ($eventoSelecionado && $eventoSelecionado['usuario_id'] != $usuario_id) {
    echo "Acesso negado!";
    exit;
}
}
?>

<h2>Editar Evento</h2>

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

<form class="forms" action="../controllers/editar_historia.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $eventoSelecionado['id'] ?>">

    <textarea name="evento" required><?= $eventoSelecionado['evento'] ?></textarea>
    <br><br>

    <input type="date" name="data_historica" value="<?= $eventoSelecionado['data_historica'] ?>" required>
    <br><br>

    <?php if ($eventoSelecionado['imagem']): ?>
        <img src="../assets/img/<?= $eventoSelecionado['imagem'] ?>" width="150"><br><br>
    <?php endif; ?>

    <input type="file" name="imagem"><br><br>

    <button type="submit">Salvar</button>

</form>

<a href="./hoje.php"><button>Voltar</button></a>

<?php endif; ?>

