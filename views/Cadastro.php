<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <link rel="icon" type="image/png" sizes="35x35" href="../assets/cadastro.png">
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>Criar Conta</h2>

<form class="forms" action="../controllers/cadastrar.php" method="POST" enctype="multipart/form-data">
    
    <input type="text" name="nome" placeholder="Nome" required>
    <br><br>

    <input type="email" name="email" placeholder="Email" required>
    <br><br>

    <input type="password" name="senha" placeholder="Senha" required>
    <br><br>

    <input type="file" name="imagem" accept="image/*">
    <br><br>

    <button type="submit">Cadastrar</button>
</form>

<a href="../index.php"><button>Voltar</button></a>

</body>
</html>