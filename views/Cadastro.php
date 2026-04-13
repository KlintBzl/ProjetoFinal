<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <link rel="icon" type="image/png" sizes="35x35" href="../assets/cadastro.png">
    <link rel="stylesheet" href="../style.css">
</head>
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <link rel="icon" type="image/png" sizes="35x35" href="../assets/cadastro.png">
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="card">

<img src="../assets/Ecos do Passado.png" alt="Logo" class="logo">

</div>

<div class="login-container">

    <div class="login-card">
        <h2>Criar Conta</h2>

        <form class="forms" action="../controllers/cadastrar.php" method="POST" enctype="multipart/form-data">
            
            <input type="text" name="nome" placeholder="Nome" required>

            <input type="email" name="email" placeholder="Email" required>

            <input type="password" name="senha" placeholder="Senha" required>

            <label class="upload-label">
                Escolher foto de perfil
                <input type="file" name="imagem" accept="image/*">
            </label>

            <button type="submit">Cadastrar</button>

        </form>

        <a href="../index.php" class="voltar">← Voltar</a>

    </div>

</div>

</body>
</html>
</html>