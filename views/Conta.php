<?php
session_start();

$usuario = $_SESSION['usuario'] ?? null;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conta</title>
    <link rel="icon" type="image/png" sizes="35x35" href="../assets/conta.png">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <div class="card">
    <a href="../index.php"><button>Voltar</button></a>
    <a href="../controllers/logout.php"><button>SAIR</button></a>
    </div><div class="card">
    <a href="./editar_usuario.php"><button>Editar</button></a>
    <a href="../controllers/excluir_usuario.php" 
   onclick="return confirm('Tem certeza que deseja excluir sua conta?')"><button>Excluir</button></a>
   </div><div class="topo">

    <?php if ($usuario): ?>
    
    <?php
    $caminho = "../uploads/" . $usuario['imagem'];

    if (!empty($usuario['imagem']) && file_exists($caminho)) {
        $imagem = $usuario['imagem'];
    } else {
        $imagem = 'padrao.png';
    }
    ?>

    <div class="perfil">
            <img src="../uploads/<?= urlencode($imagem); ?>" class="avatar">
        <span><?= $usuario['nome']; ?></span>
    </div>

<?php else: ?>

    <a href="views/Login.php">Login</a>
    <a href="views/Cadastro.php">Cadastro</a>

<?php endif; ?>

</div>
   </div>
</body>
</html>