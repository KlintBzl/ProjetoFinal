<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
<link rel="icon" type="image/png" sizes="35x35" href="../assets/login.png">
</head>
<body>

<h2>Login</h2>

<form action="../controllers/login.php" method="POST">

    <input type="email" name="email" placeholder="Email" required>
    <br><br>

    <input type="password" name="senha" placeholder="Senha" required>
    <br><br>

    <button type="submit">Entrar</button>
    <br>
    Ainda não se cadastrou? <a href="./Cadastro.php">Cadastre-se aqui!</a>

</form>
<a href="../index.php"><button>Voltar</button></a>

</body>
</html>