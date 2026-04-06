<link rel="icon" type="image/png" sizes="35x35" href="../assets/evento.png">
    <link rel="stylesheet" href="../style.css">

<form class="forms" action="../controllers/criar_historia.php" method="POST" enctype="multipart/form-data">
    
    <label>Evento:</label><br>
    <textarea name="evento" rows="5" required></textarea>
    <br><br>

    <input type="date" name="data_historica" required><br><br>

    <input type="file" name="imagem"><br><br>

    <button type="submit">Salvar</button>

</form>

<a href="./hoje.php"><button>Voltar</button></a>