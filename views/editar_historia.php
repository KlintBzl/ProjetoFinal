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
<body>

<div class="card">

<img src="../assets/Ecos do Passado.png" alt="Logo" class="logo">

</div>

<div class="edit-container">

    <!-- CARD DE SELEÇÃO -->
    <div class="login-card">

        <h2>Editar Evento</h2>

        <form class="forms" method="GET">

            <label>Escolha o evento:</label>

            <select name="id" onchange="this.form.submit()">
                <option value="">-- Selecione --</option>

                <?php foreach ($eventos as $e): ?>
                    <option value="<?= $e['id'] ?>"
                        <?= (isset($_GET['id']) && $_GET['id'] == $e['id']) ? 'selected' : '' ?>>
                        
                        <?= $e['id'] ?> - <?= substr($e['evento'], 0, 40) ?>...
                    </option>
                <?php endforeach; ?>

            </select>

        </form>

    </div>
<style>
.login-card-e{
margin-bottom: 20px;
background: #111827;
    padding: 30px;
    border-radius: 15px;
    width: 320px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.6);
    text-align: center;
}
</style>
    <!-- CARD DE EDIÇÃO -->
    <?php if ($eventoSelecionado): ?>
    <div class="login-card-e">

        <form class="forms" action="../controllers/editar_historia.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $eventoSelecionado['id'] ?>">

            <textarea id="not" name="evento" required><?= $eventoSelecionado['evento'] ?></textarea>

            <input type="date" name="data_historica" value="<?= $eventoSelecionado['data_historica'] ?>" required>

            <?php if ($eventoSelecionado['imagem']): ?>
                <img src="../assets/img/<?= $eventoSelecionado['imagem'] ?>" class="preview-img">
            <?php endif; ?>

            <label class="upload-label">
                Alterar imagem
                <input type="file" name="imagem">
            </label>

            <button type="submit">Salvar Alterações</button>

        </form>

        <a href="./hoje.php" class="voltar">← Voltar</a>

    </div>
    <?php endif; ?>

</div>

</body>