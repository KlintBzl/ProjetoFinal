<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <link rel="icon" type="image/png" sizes="35x35" href="../assets/cadastro.png">
</head>
<body>

<h2>Criar Conta</h2>

<form action="../controllers/cadastrar.php" method="POST">
    
    <input type="text" name="nome" placeholder="Nome" required>
    <br><br>

    <input type="email" name="email" placeholder="Email" required>
    <br><br>

    <input type="password" name="senha" placeholder="Senha" required>
    <br><br>

    <button type="submit">Cadastrar</button>
    <br>
    Já está logado? <a href="./Login.php">Entre aqui!</a>

</form>

<a href="../index.php"><button>Voltar</button></a>

</body>
</html>