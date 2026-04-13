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

<h2>Editar Conta</h2>

<form class="forms" action="../controllers/editar_usuario.php" method="POST">

    <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required>
    <br><br>

    <input type="email" name="email" value="<?= $usuario['email'] ?>" required>
    <br><br>

    <input type="password" name="senha" placeholder="Nova senha (opcional)">
    <br><br>

    <button type="submit">Salvar</button>

</form>

<form class="forms" action="../controllers/atualizar_usuario.php" method="POST" enctype="multipart/form-data">
    
    <input type="file" name="imagem" accept="image/*">
    <br><br>

    <button type="submit">Atualizar Foto</button>
    <a href="../controllers/remover_foto.php">
    <button>Remover Foto</button>
</a>
</form>

<a href="../index.php"><button>Voltar</button></a>

</body>
</html>