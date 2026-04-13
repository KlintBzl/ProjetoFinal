<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Conta</title>
    <link rel="icon" type="image/png" sizes="35x35" href="../assets/edit.png">
        <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="card">

<img src="../assets/Ecos do Passado.png" alt="Logo" class="logo">

</div>

<div class="login-container">

    <!-- CARD PERFIL -->
    <div class="login-card editor">

        <h2>Editar Conta</h2>

        <!-- FOTO -->
        <div class="perfil-topo">
            <?php
            $imagem = (!empty($usuario['imagem']) && file_exists("../uploads/" . $usuario['imagem']))
                ? $usuario['imagem']
                : "padrao.png";
            ?>

            <img src="../uploads/<?= $imagem ?>" id="previewPerfil" class="avatar-grande">
        </div>

        <!-- DADOS -->
        <form class="forms" action="../controllers/editar_usuario.php" method="POST">

            <input type="text" name="nome" value="<?= $usuario['nome'] ?>" placeholder="Nome">

            <input type="email" name="email" value="<?= $usuario['email'] ?>" placeholder="Email">

            <input type="password" name="senha" placeholder="Nova senha (opcional)">

            <button type="submit">Salvar Alterações</button>

        </form>

    </div>

    <!-- CARD IMAGEM -->
    <div class="login-card">

        <form class="forms" action="../controllers/atualizar_usuario.php" method="POST" enctype="multipart/form-data">

            <label class="upload-label">
                Alterar Foto
                <input type="file" name="imagem" accept="image/*">
            </label>

            <button type="submit">Atualizar Foto</button>

        </form>

        <form action="../controllers/remover_foto.php">
            <button class="btn-danger">Remover Foto</button>
        </form>

        <a href="../index.php" class="voltar">← Voltar</a>

    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const input = document.querySelector('input[name="imagem"]');
    const preview = document.getElementById("previewPerfil");

    if (input && preview) {
        input.addEventListener("change", () => {
            const file = input.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
            }
        });
    }
});
</script>

</body>
</html>