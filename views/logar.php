<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
<link rel="icon" type="image/png" sizes="35x35" href="../assets/login.png">
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="login-container">

    <div class="login-card">
        <h2>Entrar</h2>

        <form class="forms" action="../controllers/login.php" method="POST">

            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="senha" placeholder="Senha" required>

            <button type="submit">Entrar</button>

            <p class="cadastro">
                Ainda não se cadastrou? 
                <a href="./verificarcadastro.php">Cadastre-se aqui!</a>
            </p>

        </form>

        <a href="../index.php" class="voltar">← Não quero logar</a>

    </div>

</div>

</body>
</html>