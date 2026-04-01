<?php
session_start();
require_once "../dao/HistoriaDAO.php";

$evento = $_POST['evento'];
$data = $_POST['data_historica'];
$usuario = $_SESSION['usuario']['id'];

$imagem = null;

if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
    $imagem = time() . "_" . $_FILES['imagem']['name'];
    move_uploaded_file($_FILES['imagem']['tmp_name'], "../assets/img/" . $imagem);
}

$dao = new HistoriaDAO();
$dao->criar($evento, $data, $imagem, $usuario);

header("Location: ../views/hoje.php");