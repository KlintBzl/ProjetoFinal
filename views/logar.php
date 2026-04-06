<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
<link rel="icon" type="image/png" sizes="35x35" href="../assets/login.png">
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>Login</h2>

<form class="forms" action="../controllers/login.php" method="POST">

    <input type="email" name="email" placeholder="Email" required>
    <br><br>

    <input type="password" name="senha" placeholder="Senha" required>
    <br><br>

    <button type="submit">Entrar</button>
    <br>
    <p class="cadastro">Ainda não se cadastrou? <a href="./Cadastro.php">Cadastre-se aqui!</a></p>

</form>
<a href="../index.php"><button>Não quero logar</button></a>

</body>
</html>