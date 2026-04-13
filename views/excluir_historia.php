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
<body>

<div class="edit-container">

    <!-- CARD DE SELEÇÃO -->
    <div class="login-card">

        <h2>Excluir Evento</h2>

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

    <!-- CARD DE CONFIRMAÇÃO -->
    <?php if ($eventoSelecionado): ?>
    <div class="login-card perigo">

        <h3>⚠️ Tem certeza que deseja excluir?</h3>

        <div class="info-evento">
            <p><strong>Evento:</strong> <?= $eventoSelecionado['evento'] ?></p>
            <p><strong>Data:</strong> <?= date('d/m/Y', strtotime($eventoSelecionado['data_historica'])) ?></p>
        </div>

        <?php if ($eventoSelecionado['imagem']): ?>
            <img src="../assets/img/<?= $eventoSelecionado['imagem'] ?>" class="preview-img">
        <?php endif; ?>

        <form action="../controllers/excluir_historia.php" method="POST"
              onsubmit="return confirm('Tem certeza que deseja excluir este evento?');">

            <input type="hidden" name="id" value="<?= $eventoSelecionado['id'] ?>">

            <button type="submit" class="btn-danger">Excluir Evento</button>

        </form>

        <a href="./hoje.php" class="voltar">← Cancelar</a>

    </div>
    <?php endif; ?>

</div>

</body>