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
</head>
<body>

<h2>Editar Conta</h2>

<form action="../controllers/editar_usuario.php" method="POST">

    <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required>
    <br><br>

    <input type="email" name="email" value="<?= $usuario['email'] ?>" required>
    <br><br>

    <input type="password" name="senha" placeholder="Nova senha (opcional)">
    <br><br>

    <button type="submit">Salvar</button>

</form>

<a href="../index.php"><button>Voltar</button></a>

</body>
</html>