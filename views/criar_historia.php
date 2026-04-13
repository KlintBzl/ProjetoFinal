<link rel="icon" type="image/png" sizes="35x35" href="../assets/evento.png">
    <link rel="stylesheet" href="../style.css">

<body>

<div class="login-container">

    <div class="login-card editor">

        <h2>Novo Evento</h2>

        <form class="forms" action="../controllers/criar_historia.php" method="POST" enctype="multipart/form-data">

            <textarea id="not" name="evento" placeholder="Descreva o evento histórico..." required></textarea>

            <input type="date" name="data_historica" required>

            <label class="upload-label">
                Adicionar imagem (opcional)
                <input type="file" name="imagem">
            </label>

            <button type="submit">Salvar Evento</button>

        </form>

        <a href="./hoje.php" class="voltar">← Voltar</a>

    </div>

</div>

</body>