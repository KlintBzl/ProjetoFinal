<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar</title>
</head>
<body>


    <form method="POST">

    <label>Verificação de senha</label>
    <input type="password" name="SS" required>

    <button type="submit">Verificar</button>


</form>

<?php
if (isset($_POST['SS'])) {

    if ($_POST['SS'] === "Senhafoda123") {
        echo "<a href='./cadastro.php'><button>Continuar</button></a>";
    } else {
        echo "<p>Senha incorreta!</p>";
    }
}
?>


<a href="../index.php"><button class="bac">Voltar</button></a>




</body>
</html>

<style>
    body {
    background: #1a170a;
    font-family: Arial, sans-serif;
    color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* caixa principal */
form {
    background: #1f190f;
    padding: 30px;
    border-radius: 15px;
    border: 2px solid #d9ff00;
    box-shadow: 0 0 15px rgba(0, 255, 221, 0.2);
    text-align: center;
    width: 300px;
}

/* título */
label {
    display: block;
    margin-bottom: 10px;
    font-size: 16px;
}

/* input */
input {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    border: none;
    outline: none;
    margin-bottom: 15px;
    background: #2f271a;
    color: white;
}

/* botão */
button {
    width: 100%;
    padding: 10px;
    background: #ffd000;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

/* hover */
button:hover {
    background: #c9cc00;
}

/* link depois de liberar */
a button {
    margin-top: 10px;
    margin-left: 10px;
    background: #7bff00;
}
.bac {
    margin-top: 10px;
    margin-left: 20px;
    background: #7bff00;
}

a button:hover {
    background: #74cd00;
}

/* mensagem erro */
p {
    margin-top: 10px;
    margin-left: 10px;
    color: #ff4d4d;
}
</style>